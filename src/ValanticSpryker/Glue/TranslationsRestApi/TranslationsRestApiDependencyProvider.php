<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;
use ValanticSpryker\Glue\TranslationsRestApi\Dependency\GlossaryStorageProviderPluginPlugin;

class TranslationsRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const TRANSLATION_PROVIDER_PLUGINS = 'TRANSLATION_DATA_PLUGIN';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $this->getTranslationDataProviderPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return void
     */
    public function getTranslationDataProviderPlugin(Container $container): void
    {
        $container->set(
            self::TRANSLATION_PROVIDER_PLUGINS,
            fn (): array => [new GlossaryStorageProviderPluginPlugin($container->getLocator()->glossaryStorage()->client())]
        );
    }
}
