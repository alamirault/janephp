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
    class GbCompanyReportExampleResponseReportCompanySummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('businessName', $data)) {
                $object->setBusinessName($data['businessName']);
                unset($data['businessName']);
            }
            if (\array_key_exists('country', $data)) {
                $object->setCountry($data['country']);
                unset($data['country']);
            }
            if (\array_key_exists('companyNumber', $data)) {
                $object->setCompanyNumber($data['companyNumber']);
                unset($data['companyNumber']);
            }
            if (\array_key_exists('companyRegistrationNumber', $data)) {
                $object->setCompanyRegistrationNumber($data['companyRegistrationNumber']);
                unset($data['companyRegistrationNumber']);
            }
            if (\array_key_exists('mainActivity', $data)) {
                $object->setMainActivity($this->denormalizer->denormalize($data['mainActivity'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryMainActivity::class, 'json', $context));
                unset($data['mainActivity']);
            }
            if (\array_key_exists('companyStatus', $data)) {
                $object->setCompanyStatus($this->denormalizer->denormalize($data['companyStatus'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryCompanyStatus::class, 'json', $context));
                unset($data['companyStatus']);
            }
            if (\array_key_exists('latestTurnoverFigure', $data)) {
                $object->setLatestTurnoverFigure($this->denormalizer->denormalize($data['latestTurnoverFigure'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryLatestTurnoverFigure::class, 'json', $context));
                unset($data['latestTurnoverFigure']);
            }
            if (\array_key_exists('latestShareholdersEquityFigure', $data)) {
                $object->setLatestShareholdersEquityFigure($this->denormalizer->denormalize($data['latestShareholdersEquityFigure'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryLatestShareholdersEquityFigure::class, 'json', $context));
                unset($data['latestShareholdersEquityFigure']);
            }
            if (\array_key_exists('creditRating', $data)) {
                $object->setCreditRating($this->denormalizer->denormalize($data['creditRating'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryCreditRating::class, 'json', $context));
                unset($data['creditRating']);
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
            if ($object->isInitialized('businessName') && null !== $object->getBusinessName()) {
                $data['businessName'] = $object->getBusinessName();
            }
            if ($object->isInitialized('country') && null !== $object->getCountry()) {
                $data['country'] = $object->getCountry();
            }
            if ($object->isInitialized('companyNumber') && null !== $object->getCompanyNumber()) {
                $data['companyNumber'] = $object->getCompanyNumber();
            }
            if ($object->isInitialized('companyRegistrationNumber') && null !== $object->getCompanyRegistrationNumber()) {
                $data['companyRegistrationNumber'] = $object->getCompanyRegistrationNumber();
            }
            if ($object->isInitialized('mainActivity') && null !== $object->getMainActivity()) {
                $data['mainActivity'] = $this->normalizer->normalize($object->getMainActivity(), 'json', $context);
            }
            if ($object->isInitialized('companyStatus') && null !== $object->getCompanyStatus()) {
                $data['companyStatus'] = $this->normalizer->normalize($object->getCompanyStatus(), 'json', $context);
            }
            if ($object->isInitialized('latestTurnoverFigure') && null !== $object->getLatestTurnoverFigure()) {
                $data['latestTurnoverFigure'] = $this->normalizer->normalize($object->getLatestTurnoverFigure(), 'json', $context);
            }
            if ($object->isInitialized('latestShareholdersEquityFigure') && null !== $object->getLatestShareholdersEquityFigure()) {
                $data['latestShareholdersEquityFigure'] = $this->normalizer->normalize($object->getLatestShareholdersEquityFigure(), 'json', $context);
            }
            if ($object->isInitialized('creditRating') && null !== $object->getCreditRating()) {
                $data['creditRating'] = $this->normalizer->normalize($object->getCreditRating(), 'json', $context);
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
            return [\CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class => false];
        }
    }
} else {
    class GbCompanyReportExampleResponseReportCompanySummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class;
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
            $object = new \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('businessName', $data)) {
                $object->setBusinessName($data['businessName']);
                unset($data['businessName']);
            }
            if (\array_key_exists('country', $data)) {
                $object->setCountry($data['country']);
                unset($data['country']);
            }
            if (\array_key_exists('companyNumber', $data)) {
                $object->setCompanyNumber($data['companyNumber']);
                unset($data['companyNumber']);
            }
            if (\array_key_exists('companyRegistrationNumber', $data)) {
                $object->setCompanyRegistrationNumber($data['companyRegistrationNumber']);
                unset($data['companyRegistrationNumber']);
            }
            if (\array_key_exists('mainActivity', $data)) {
                $object->setMainActivity($this->denormalizer->denormalize($data['mainActivity'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryMainActivity::class, 'json', $context));
                unset($data['mainActivity']);
            }
            if (\array_key_exists('companyStatus', $data)) {
                $object->setCompanyStatus($this->denormalizer->denormalize($data['companyStatus'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryCompanyStatus::class, 'json', $context));
                unset($data['companyStatus']);
            }
            if (\array_key_exists('latestTurnoverFigure', $data)) {
                $object->setLatestTurnoverFigure($this->denormalizer->denormalize($data['latestTurnoverFigure'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryLatestTurnoverFigure::class, 'json', $context));
                unset($data['latestTurnoverFigure']);
            }
            if (\array_key_exists('latestShareholdersEquityFigure', $data)) {
                $object->setLatestShareholdersEquityFigure($this->denormalizer->denormalize($data['latestShareholdersEquityFigure'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryLatestShareholdersEquityFigure::class, 'json', $context));
                unset($data['latestShareholdersEquityFigure']);
            }
            if (\array_key_exists('creditRating', $data)) {
                $object->setCreditRating($this->denormalizer->denormalize($data['creditRating'], \CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummaryCreditRating::class, 'json', $context));
                unset($data['creditRating']);
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
            if ($object->isInitialized('businessName') && null !== $object->getBusinessName()) {
                $data['businessName'] = $object->getBusinessName();
            }
            if ($object->isInitialized('country') && null !== $object->getCountry()) {
                $data['country'] = $object->getCountry();
            }
            if ($object->isInitialized('companyNumber') && null !== $object->getCompanyNumber()) {
                $data['companyNumber'] = $object->getCompanyNumber();
            }
            if ($object->isInitialized('companyRegistrationNumber') && null !== $object->getCompanyRegistrationNumber()) {
                $data['companyRegistrationNumber'] = $object->getCompanyRegistrationNumber();
            }
            if ($object->isInitialized('mainActivity') && null !== $object->getMainActivity()) {
                $data['mainActivity'] = $this->normalizer->normalize($object->getMainActivity(), 'json', $context);
            }
            if ($object->isInitialized('companyStatus') && null !== $object->getCompanyStatus()) {
                $data['companyStatus'] = $this->normalizer->normalize($object->getCompanyStatus(), 'json', $context);
            }
            if ($object->isInitialized('latestTurnoverFigure') && null !== $object->getLatestTurnoverFigure()) {
                $data['latestTurnoverFigure'] = $this->normalizer->normalize($object->getLatestTurnoverFigure(), 'json', $context);
            }
            if ($object->isInitialized('latestShareholdersEquityFigure') && null !== $object->getLatestShareholdersEquityFigure()) {
                $data['latestShareholdersEquityFigure'] = $this->normalizer->normalize($object->getLatestShareholdersEquityFigure(), 'json', $context);
            }
            if ($object->isInitialized('creditRating') && null !== $object->getCreditRating()) {
                $data['creditRating'] = $this->normalizer->normalize($object->getCreditRating(), 'json', $context);
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
            return [\CreditSafe\API\Model\GbCompanyReportExampleResponseReportCompanySummary::class => false];
        }
    }
}