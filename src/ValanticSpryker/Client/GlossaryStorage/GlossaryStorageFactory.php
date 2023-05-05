<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage;

use Spryker\Client\GlossaryStorage\GlossaryStorageFactory as SprykerGlossaryStorageFactory;
use Spryker\Client\Storage\StorageClient;

class GlossaryStorageFactory extends SprykerGlossaryStorageFactory
{
    /**
     * @return \Spryker\Client\Storage\StorageClient
     */
    public function getRealStorageClient(): StorageClient
    {
        return $this->getProvidedDependency(GlossaryStorageDependencyProvider::REAL_STORAGE_CLIENT);
    }
}
