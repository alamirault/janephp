<?php

namespace Jane\JsonSchema\Tests\Expected\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\JsonSchema\\Tests\\Expected\\Model\\Test';
    }
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\JsonSchema\Tests\Expected\Model\Test;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        if (isset($data->{'$recursiveRef'})) {
            return new Reference($data->{'$recursiveRef'}, $context['document-origin']);
        }
        $object = new \Jane\JsonSchema\Tests\Expected\Model\Test();
        if (property_exists($data, 'date')) {
            $object->setDate(\DateTime::createFromFormat('l, d-M-y H:i:s T', $data->{'date'}));
        }
        if (property_exists($data, 'dateOrNull') && $data->{'dateOrNull'} !== null) {
            $value = $data->{'dateOrNull'};
            if (is_string($data->{'dateOrNull'}) and false !== \DateTime::createFromFormat('l, d-M-y H:i:s T', $data->{'dateOrNull'})) {
                $value = \DateTime::createFromFormat('l, d-M-y H:i:s T', $data->{'dateOrNull'});
            } elseif (is_null($data->{'dateOrNull'})) {
                $value = $data->{'dateOrNull'};
            }
            $object->setDateOrNull($value);
        }
        elseif (property_exists($data, 'dateOrNull') && $data->{'dateOrNull'} === null) {
            $object->setDateOrNull(null);
        }
        if (property_exists($data, 'dateOrNullOrInt') && $data->{'dateOrNullOrInt'} !== null) {
            $value_1 = $data->{'dateOrNullOrInt'};
            if (is_string($data->{'dateOrNullOrInt'}) and false !== \DateTime::createFromFormat('l, d-M-y H:i:s T', $data->{'dateOrNullOrInt'})) {
                $value_1 = \DateTime::createFromFormat('l, d-M-y H:i:s T', $data->{'dateOrNullOrInt'});
            } elseif (is_null($data->{'dateOrNullOrInt'})) {
                $value_1 = $data->{'dateOrNullOrInt'};
            } elseif (is_int($data->{'dateOrNullOrInt'})) {
                $value_1 = $data->{'dateOrNullOrInt'};
            }
            $object->setDateOrNullOrInt($value_1);
        }
        elseif (property_exists($data, 'dateOrNullOrInt') && $data->{'dateOrNullOrInt'} === null) {
            $object->setDateOrNullOrInt(null);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getDate()) {
            $data->{'date'} = $object->getDate()->format('l, d-M-y H:i:s T');
        }
        $value = $object->getDateOrNull();
        if (is_object($object->getDateOrNull())) {
            $value = $object->getDateOrNull()->format('l, d-M-y H:i:s T');
        } elseif (is_null($object->getDateOrNull())) {
            $value = $object->getDateOrNull();
        }
        $data->{'dateOrNull'} = $value;
        $value_1 = $object->getDateOrNullOrInt();
        if (is_object($object->getDateOrNullOrInt())) {
            $value_1 = $object->getDateOrNullOrInt()->format('l, d-M-y H:i:s T');
        } elseif (is_null($object->getDateOrNullOrInt())) {
            $value_1 = $object->getDateOrNullOrInt();
        } elseif (is_int($object->getDateOrNullOrInt())) {
            $value_1 = $object->getDateOrNullOrInt();
        }
        $data->{'dateOrNullOrInt'} = $value_1;
        return $data;
    }
}