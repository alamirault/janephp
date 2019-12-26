<?php

namespace Jane\OpenApi2\Generator\Authentication;

use Http\Client\Common\Plugin;
use Http\Message\Authentication;
use Jane\OpenApi2\Model\ApiKeySecurity;
use Jane\OpenApiCommon\Guesser\Guess\SecuritySchemeGuess;
use PhpParser\Node;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt;
use PhpParser\Node\Name;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar;
use Psr\Http\Message\RequestInterface;

trait GetPluginGenerator
{
    protected function createGetPlugin(SecuritySchemeGuess $securityScheme): Stmt\ClassMethod
    {
        $stmts = [];
        switch ($securityScheme->getType()) {
            case SecuritySchemeGuess::TYPE_API_KEY:
                /** @var ApiKeySecurity $object */
                $object = $securityScheme->getObject();
                $authenticateStmts = [];

                switch ($object->getIn()) {
                    case 'header':
                        $authenticateStmts = [
                            new Stmt\Return_(new Expr\MethodCall(new Expr\Variable('request'), 'withHeader', [
                                new Node\Arg(new Scalar\String_($object->getName())),
                                new Node\Arg(new Expr\PropertyFetch(new Expr\Variable('this'), new Scalar\String_('apiKey'))),
                            ])),
                        ];
                        break;
                    case 'query':
                        $authenticateStmts = [
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('uri'), new Expr\MethodCall(new Expr\Variable('request'), 'getUri'))),
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('query'), new Expr\MethodCall(new Expr\Variable('uri'), 'getQuery'))),
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('params'), new Expr\Array_())),
                            new Stmt\Expression(new Expr\FuncCall(new Name('parse_str'), [
                                new Node\Arg(new Expr\Variable('query')),
                                new Node\Arg(new Expr\Variable('params')),
                            ])),
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('params'), new Expr\FuncCall(new Name('array_merge'), [
                                new Node\Arg(new Expr\Variable('params')),
                                new Node\Arg(new Expr\Array_([
                                    new Expr\ArrayItem(new Expr\PropertyFetch(new Expr\Variable('this'), new Scalar\String_('apiKey')), new Scalar\String_($object->getName())),
                                ])),
                            ]))),
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('query'), new Expr\FuncCall(new Name('http_build_query'), [
                                new Node\Arg(new Expr\Variable('params')),
                                new Node\Arg(new Expr\ConstFetch(new Name('null'))),
                                new Node\Arg(new Scalar\String_('&')),
                            ]))),
                            new Stmt\Expression(new Expr\Assign(new Expr\Variable('uri'), new Expr\MethodCall(new Expr\Variable('uri'), 'withQuery', [
                                new Node\Arg(new Expr\Variable('query')),
                            ]))),
                            new Stmt\Return_(new Expr\MethodCall(new Expr\Variable('request'), 'withUri', [
                                new Node\Arg(new Expr\Variable('uri')),
                            ])),
                        ];
                        break;
                }

                $pluginClass = new Stmt\Class_(null, [
                    'implements' => [new Name\FullyQualified(Authentication::class)],
                    'stmts' => [
                        new Stmt\Property(Stmt\Class_::MODIFIER_PRIVATE, [new Stmt\PropertyProperty('apiKey')]),
                        new Stmt\ClassMethod('__construct', [
                            'type' => Stmt\Class_::MODIFIER_PUBLIC,
                            'params' => [new Param(new Expr\Variable('apiKey'), null, new Name('string'))],
                            'stmts' => [new Stmt\Expression(new Expr\Assign(new Expr\PropertyFetch(new Expr\Variable('this'), new Scalar\String_('apiKey')), new Expr\Variable('apiKey')))],
                        ]),
                        new Stmt\ClassMethod('authenticate', [
                            'type' => Stmt\Class_::MODIFIER_PUBLIC,
                            'params' => [new Param(new Expr\Variable('request'), null, new Name\FullyQualified(RequestInterface::class))],
                            'stmts' => $authenticateStmts,
                        ]),
                    ],
                ]);

                $stmts[] = new Stmt\Return_(new Expr\New_(new Name\FullyQualified(Plugin\AuthenticationPlugin::class), [
                    new Node\Arg(new Expr\New_($pluginClass, [
                        new Node\Arg(new Expr\PropertyFetch(new Expr\Variable('this'), new Scalar\String_('apiKey'))),
                    ])),
                ]));
                break;
            default:
                throw new \Exception(sprintf('Jane actually does not support Security type %s generation', $securityScheme->getType()));
                break;
        }

        return new Stmt\ClassMethod('getPlugin', [
            'type' => Stmt\Class_::MODIFIER_PUBLIC,
            'stmts' => $stmts,
            'returnType' => new Name\FullyQualified(Plugin::class),
        ]);
    }
}
