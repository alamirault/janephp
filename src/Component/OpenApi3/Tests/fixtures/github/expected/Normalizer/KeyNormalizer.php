<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class KeyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\Key::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\Key::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\Key();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\KeyConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('key_id', $data)) {
                $object->setKeyId($data['key_id']);
                unset($data['key_id']);
            }
            if (\array_key_exists('key', $data)) {
                $object->setKey($data['key']);
                unset($data['key']);
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('title', $data)) {
                $object->setTitle($data['title']);
                unset($data['title']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('read_only', $data)) {
                $object->setReadOnly($data['read_only']);
                unset($data['read_only']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('keyId') && null !== $object->getKeyId()) {
                $data['key_id'] = $object->getKeyId();
            }
            if ($object->isInitialized('key') && null !== $object->getKey()) {
                $data['key'] = $object->getKey();
            }
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('title') && null !== $object->getTitle()) {
                $data['title'] = $object->getTitle();
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\TH:i:sP');
            }
            if ($object->isInitialized('verified') && null !== $object->getVerified()) {
                $data['verified'] = $object->getVerified();
            }
            if ($object->isInitialized('readOnly') && null !== $object->getReadOnly()) {
                $data['read_only'] = $object->getReadOnly();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\KeyConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\Key::class => false];
        }
    }
} else {
    class KeyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\Key::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\Key::class;
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\Key();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\KeyConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('key_id', $data)) {
                $object->setKeyId($data['key_id']);
                unset($data['key_id']);
            }
            if (\array_key_exists('key', $data)) {
                $object->setKey($data['key']);
                unset($data['key']);
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('title', $data)) {
                $object->setTitle($data['title']);
                unset($data['title']);
            }
            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }
            if (\array_key_exists('verified', $data)) {
                $object->setVerified($data['verified']);
                unset($data['verified']);
            }
            if (\array_key_exists('read_only', $data)) {
                $object->setReadOnly($data['read_only']);
                unset($data['read_only']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('keyId') && null !== $object->getKeyId()) {
                $data['key_id'] = $object->getKeyId();
            }
            if ($object->isInitialized('key') && null !== $object->getKey()) {
                $data['key'] = $object->getKey();
            }
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('title') && null !== $object->getTitle()) {
                $data['title'] = $object->getTitle();
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['created_at'] = $object->getCreatedAt()->format('Y-m-d\TH:i:sP');
            }
            if ($object->isInitialized('verified') && null !== $object->getVerified()) {
                $data['verified'] = $object->getVerified();
            }
            if ($object->isInitialized('readOnly') && null !== $object->getReadOnly()) {
                $data['read_only'] = $object->getReadOnly();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\KeyConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\Key::class => false];
        }
    }
}