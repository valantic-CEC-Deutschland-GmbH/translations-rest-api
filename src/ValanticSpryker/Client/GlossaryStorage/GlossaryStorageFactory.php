<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage;

use Spryker\Client\GlossaryStorage\GlossaryStorageFactory as SprykerGlossaryStorageFactory;
use Spryker\Client\Storage\StorageClientInterface;

class GlossaryStorageFactory extends SprykerGlossaryStorageFactory
{
    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    public function getRealStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(GlossaryStorageDependencyProvider::REAL_STORAGE_CLIENT);
    }
}
