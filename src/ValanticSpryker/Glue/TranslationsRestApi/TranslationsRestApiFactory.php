<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi;

use Spryker\Glue\Kernel\AbstractFactory;
use ValanticSpryker\Glue\TranslationsRestApi\Processor\TranslationsRestApiProcessor;

/**
 * @method \ValanticSpryker\Glue\TranslationsRestApi\TranslationsRestApiConfig getConfig()
 */
class TranslationsRestApiFactory extends AbstractFactory
{
    /**
     * @return \ValanticSpryker\Glue\TranslationsRestApi\Processor\TranslationsRestApiProcessor
     */
    public function createTranslationsRestApiProcessor(): TranslationsRestApiProcessor
    {
        return new TranslationsRestApiProcessor(
            $this->getResourceBuilder(),
            $this->getTranslationDataProviderPlugins(),
        );
    }

    /**
     * @return array<\ValanticSpryker\Glue\TranslationsRestApi\Dependency\TranslationsProviderPluginInterface>
     */
    private function getTranslationDataProviderPlugins(): array
    {
        return $this->getProvidedDependency(TranslationsRestApiDependencyProvider::TRANSLATION_PROVIDER_PLUGINS);
    }
}
