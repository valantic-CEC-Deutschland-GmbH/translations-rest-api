<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage;

use Spryker\Client\GlossaryStorage\GlossaryStorageDependencyProvider as SprykerGlossaryStorageDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\Storage\StorageClient;

class GlossaryStorageDependencyProvider extends SprykerGlossaryStorageDependencyProvider
{
    public const REAL_STORAGE_CLIENT = 'REAL_STORAGE_CLIENT';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = parent::provideServiceLayerDependencies($container);
        $container->set(
            self::REAL_STORAGE_CLIENT,
            fn (): StorageClient => $container->getLocator()->storage()->client()
        );

        return $container;
    }
}
