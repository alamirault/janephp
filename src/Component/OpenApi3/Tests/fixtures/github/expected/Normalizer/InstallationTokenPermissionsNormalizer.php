<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class InstallationTokenPermissionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Github\\Model\\InstallationTokenPermissions';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Github\\Model\\InstallationTokenPermissions';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Github\Model\InstallationTokenPermissions();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issues', $data)) {
            $object->setIssues($data['issues']);
        }
        if (\array_key_exists('contents', $data)) {
            $object->setContents($data['contents']);
        }
        if (\array_key_exists('metadata', $data)) {
            $object->setMetadata($data['metadata']);
        }
        if (\array_key_exists('single_file', $data)) {
            $object->setSingleFile($data['single_file']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getIssues()) {
            $data['issues'] = $object->getIssues();
        }
        if (null !== $object->getContents()) {
            $data['contents'] = $object->getContents();
        }
        if (null !== $object->getMetadata()) {
            $data['metadata'] = $object->getMetadata();
        }
        if (null !== $object->getSingleFile()) {
            $data['single_file'] = $object->getSingleFile();
        }
        return $data;
    }
}