<?php

namespace PicturePark\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use PicturePark\API\Runtime\Normalizer\CheckArray;
use PicturePark\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class NamedCacheConfigurationBaseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \PicturePark\API\Model\NamedCacheConfigurationBase::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === PicturePark\API\Model\NamedCacheConfigurationBase::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (array_key_exists('kind', $data) and 'ListItemNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\ListItemNamedCacheConfiguration', $format, $context);
            }
            if (array_key_exists('kind', $data) and 'SchemaTagboxFilterLookupNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\SchemaTagboxFilterLookupNamedCacheConfiguration', $format, $context);
            }
            if (array_key_exists('kind', $data) and 'InverseListItemNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\InverseListItemNamedCacheConfiguration', $format, $context);
            }
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \PicturePark\API\Model\NamedCacheConfigurationBase();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && $data['name'] !== null) {
                $object->setName($data['name']);
            }
            elseif (\array_key_exists('name', $data) && $data['name'] === null) {
                $object->setName(null);
            }
            if (\array_key_exists('caseSensitive', $data)) {
                $object->setCaseSensitive($data['caseSensitive']);
            }
            if (\array_key_exists('kind', $data)) {
                $object->setKind($data['kind']);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if (null !== $object->getKind() and 'ListItemNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if (null !== $object->getKind() and 'SchemaTagboxFilterLookupNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if (null !== $object->getKind() and 'InverseListItemNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            $data['caseSensitive'] = $object->getCaseSensitive();
            $data['kind'] = $object->getKind();
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\PicturePark\API\Model\NamedCacheConfigurationBase::class => false];
        }
    }
} else {
    class NamedCacheConfigurationBaseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \PicturePark\API\Model\NamedCacheConfigurationBase::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === PicturePark\API\Model\NamedCacheConfigurationBase::class;
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (array_key_exists('kind', $data) and 'ListItemNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\ListItemNamedCacheConfiguration', $format, $context);
            }
            if (array_key_exists('kind', $data) and 'SchemaTagboxFilterLookupNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\SchemaTagboxFilterLookupNamedCacheConfiguration', $format, $context);
            }
            if (array_key_exists('kind', $data) and 'InverseListItemNamedCacheConfiguration' === $data['kind']) {
                return $this->denormalizer->denormalize($data, 'PicturePark\API\Model\InverseListItemNamedCacheConfiguration', $format, $context);
            }
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \PicturePark\API\Model\NamedCacheConfigurationBase();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && $data['name'] !== null) {
                $object->setName($data['name']);
            }
            elseif (\array_key_exists('name', $data) && $data['name'] === null) {
                $object->setName(null);
            }
            if (\array_key_exists('caseSensitive', $data)) {
                $object->setCaseSensitive($data['caseSensitive']);
            }
            if (\array_key_exists('kind', $data)) {
                $object->setKind($data['kind']);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if (null !== $object->getKind() and 'ListItemNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if (null !== $object->getKind() and 'SchemaTagboxFilterLookupNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if (null !== $object->getKind() and 'InverseListItemNamedCacheConfiguration' === $object->getKind()) {
                return $this->normalizer->normalize($object, $format, $context);
            }
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            $data['caseSensitive'] = $object->getCaseSensitive();
            $data['kind'] = $object->getKind();
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\PicturePark\API\Model\NamedCacheConfigurationBase::class => false];
        }
    }
}