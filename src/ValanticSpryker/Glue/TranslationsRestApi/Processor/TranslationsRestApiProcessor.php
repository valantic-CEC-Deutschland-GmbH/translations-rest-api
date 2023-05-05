<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi\Processor;

use ArrayObject;
use Generated\Shared\Transfer\RestTranslationAttributesTransfer;
use Generated\Shared\Transfer\RestTranslationsResponseAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use ValanticSpryker\Glue\TranslationsRestApi\TranslationsRestApiConfig;

class TranslationsRestApiProcessor
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param array<\ValanticSpryker\Glue\TranslationsRestApi\Dependency\TranslationsProviderPluginInterface> $translationRestApiDataProviderPlugins
     */
    public function __construct(private RestResourceBuilderInterface $restResourceBuilder, private array $translationRestApiDataProviderPlugins)
    {
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function process(RestRequestInterface $restRequest): RestResponseInterface
    {
        $keys = [];
        foreach ($this->translationRestApiDataProviderPlugins as $translationRestApiDataProviderPlugin) {
            $keys = $translationRestApiDataProviderPlugin->provide($restRequest->getMetadata()->getLocale());
        }

        $responseKeys = array_map(function ($key, $value) {
            return (new RestTranslationAttributesTransfer())
                ->setKey($key)
                ->setValue($value);
        }, array_keys($keys), $keys);

        $restResource = $this->restResourceBuilder->createRestResource(
            TranslationsRestApiConfig::TRANSLATION_RESOURCE_TYPE,
            $restRequest->getMetadata()->getLocale(),
            (new RestTranslationsResponseAttributesTransfer())
                ->setLanguage($restRequest->getMetadata()->getLocale())
                ->setKeys(new ArrayObject($responseKeys)),
        );

        return $this->restResourceBuilder
            ->createRestResponse()->addResource($restResource);
    }
}
