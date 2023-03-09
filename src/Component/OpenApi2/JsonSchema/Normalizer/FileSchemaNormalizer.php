<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\Component\OpenApi2\JsonSchema\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Jane\Component\OpenApi2\JsonSchema\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FileSchemaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\Component\\OpenApi2\\JsonSchema\\Model\\FileSchema';
    }

    public function supportsNormalization($data, $format = null, $context = []) : bool
    {
        return $data instanceof \Jane\Component\OpenApi2\JsonSchema\Model\FileSchema;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Jane\Component\OpenApi2\JsonSchema\Model\FileSchema();
        if (\array_key_exists('format', $data) && $data['format'] !== null) {
            $object->setFormat($data['format']);
            unset($data['format']);
        } elseif (\array_key_exists('format', $data) && $data['format'] === null) {
            $object->setFormat(null);
        }
        if (\array_key_exists('title', $data) && $data['title'] !== null) {
            $object->setTitle($data['title']);
            unset($data['title']);
        } elseif (\array_key_exists('title', $data) && $data['title'] === null) {
            $object->setTitle(null);
        }
        if (\array_key_exists('description', $data) && $data['description'] !== null) {
            $object->setDescription($data['description']);
            unset($data['description']);
        } elseif (\array_key_exists('description', $data) && $data['description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('default', $data) && $data['default'] !== null) {
            $object->setDefault($data['default']);
            unset($data['default']);
        } elseif (\array_key_exists('default', $data) && $data['default'] === null) {
            $object->setDefault(null);
        }
        if (\array_key_exists('required', $data) && $data['required'] !== null) {
            $values = [];
            foreach ($data['required'] as $value) {
                $values[] = $value;
            }
            $object->setRequired($values);
            unset($data['required']);
        } elseif (\array_key_exists('required', $data) && $data['required'] === null) {
            $object->setRequired(null);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('readOnly', $data) && $data['readOnly'] !== null) {
            $object->setReadOnly($data['readOnly']);
            unset($data['readOnly']);
        } elseif (\array_key_exists('readOnly', $data) && $data['readOnly'] === null) {
            $object->setReadOnly(null);
        }
        if (\array_key_exists('externalDocs', $data) && $data['externalDocs'] !== null) {
            $object->setExternalDocs($this->denormalizer->denormalize($data['externalDocs'], 'Jane\\Component\\OpenApi2\\JsonSchema\\Model\\ExternalDocs', 'json', $context));
            unset($data['externalDocs']);
        } elseif (\array_key_exists('externalDocs', $data) && $data['externalDocs'] === null) {
            $object->setExternalDocs(null);
        }
        if (\array_key_exists('example', $data) && $data['example'] !== null) {
            $object->setExample($data['example']);
            unset($data['example']);
        } elseif (\array_key_exists('example', $data) && $data['example'] === null) {
            $object->setExample(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/^x-/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getFormat()) {
            $data['format'] = $object->getFormat();
        } else {
            $data['format'] = null;
        }
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        } else {
            $data['title'] = null;
        }
        if (null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        } else {
            $data['description'] = null;
        }
        if (null !== $object->getDefault()) {
            $data['default'] = $object->getDefault();
        } else {
            $data['default'] = null;
        }
        if (null !== $object->getRequired()) {
            $values = [];
            foreach ($object->getRequired() as $value) {
                $values[] = $value;
            }
            $data['required'] = $values;
        } else {
            $data['required'] = null;
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
        } else {
            $data['type'] = null;
        }
        if (null !== $object->getReadOnly()) {
            $data['readOnly'] = $object->getReadOnly();
        } else {
            $data['readOnly'] = null;
        }
        if (null !== $object->getExternalDocs()) {
            $data['externalDocs'] = $this->normalizer->normalize($object->getExternalDocs(), 'json', $context);
        } else {
            $data['externalDocs'] = null;
        }
        if (null !== $object->getExample()) {
            $data['example'] = $object->getExample();
        } else {
            $data['example'] = null;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/^x-/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
