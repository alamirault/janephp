<?php

namespace CreditSafe\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use CreditSafe\API\Runtime\Normalizer\CheckArray;
use CreditSafe\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class CompletedFreshInvestigationSearchCriteriaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('additionalInfo', $data)) {
                $object->setAdditionalInfo($data['additionalInfo']);
                unset($data['additionalInfo']);
            }
            if (\array_key_exists('address', $data)) {
                $object->setAddress($this->denormalizer->denormalize($data['address'], \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteriaAddress::class, 'json', $context));
                unset($data['address']);
            }
            if (\array_key_exists('countryCode', $data)) {
                $object->setCountryCode($data['countryCode']);
                unset($data['countryCode']);
            }
            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }
            if (\array_key_exists('regNo', $data)) {
                $object->setRegNo($data['regNo']);
                unset($data['regNo']);
            }
            if (\array_key_exists('vatNo', $data)) {
                $object->setVatNo($data['vatNo']);
                unset($data['vatNo']);
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
            if ($object->isInitialized('additionalInfo') && null !== $object->getAdditionalInfo()) {
                $data['additionalInfo'] = $object->getAdditionalInfo();
            }
            if ($object->isInitialized('address') && null !== $object->getAddress()) {
                $data['address'] = $this->normalizer->normalize($object->getAddress(), 'json', $context);
            }
            if ($object->isInitialized('countryCode') && null !== $object->getCountryCode()) {
                $data['countryCode'] = $object->getCountryCode();
            }
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('regNo') && null !== $object->getRegNo()) {
                $data['regNo'] = $object->getRegNo();
            }
            if ($object->isInitialized('vatNo') && null !== $object->getVatNo()) {
                $data['vatNo'] = $object->getVatNo();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class => false];
        }
    }
} else {
    class CompletedFreshInvestigationSearchCriteriaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class;
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
            $object = new \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('additionalInfo', $data)) {
                $object->setAdditionalInfo($data['additionalInfo']);
                unset($data['additionalInfo']);
            }
            if (\array_key_exists('address', $data)) {
                $object->setAddress($this->denormalizer->denormalize($data['address'], \CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteriaAddress::class, 'json', $context));
                unset($data['address']);
            }
            if (\array_key_exists('countryCode', $data)) {
                $object->setCountryCode($data['countryCode']);
                unset($data['countryCode']);
            }
            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }
            if (\array_key_exists('regNo', $data)) {
                $object->setRegNo($data['regNo']);
                unset($data['regNo']);
            }
            if (\array_key_exists('vatNo', $data)) {
                $object->setVatNo($data['vatNo']);
                unset($data['vatNo']);
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
            if ($object->isInitialized('additionalInfo') && null !== $object->getAdditionalInfo()) {
                $data['additionalInfo'] = $object->getAdditionalInfo();
            }
            if ($object->isInitialized('address') && null !== $object->getAddress()) {
                $data['address'] = $this->normalizer->normalize($object->getAddress(), 'json', $context);
            }
            if ($object->isInitialized('countryCode') && null !== $object->getCountryCode()) {
                $data['countryCode'] = $object->getCountryCode();
            }
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('regNo') && null !== $object->getRegNo()) {
                $data['regNo'] = $object->getRegNo();
            }
            if ($object->isInitialized('vatNo') && null !== $object->getVatNo()) {
                $data['vatNo'] = $object->getVatNo();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\CreditSafe\API\Model\CompletedFreshInvestigationSearchCriteria::class => false];
        }
    }
}