<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage;

use Spryker\Client\GlossaryStorage\GlossaryStorageClient as SprykerGlossaryStorageClient;
use Spryker\Client\StorageRedis\Redis\StorageRedisWrapper;

/**
 * @method \ValanticSpryker\Client\GlossaryStorage\GlossaryStorageFactory getFactory()
 */
class GlossaryStorageClient extends SprykerGlossaryStorageClient implements GlossaryStorageClientInterface
{
    /**
     * @param string $localeIsoCode
     *
     * @return array
     */
    public function getTranslations(string $localeIsoCode): array
    {
        $storageIsoCode = str_replace('-', '_', strtolower($localeIsoCode));
        $keys = $this->getFactory()
            ->getRealStorageClient()->getKeys("translation:$storageIsoCode:*");

        array_walk($keys, function (&$element): void {
            $element = str_replace(StorageRedisWrapper::KV_PREFIX, '', $element);
        });

        $values = $this->getFactory()->getRealStorageClient()->getMulti($keys);

        $newValues = [];
        foreach ($values as $key => $value) {
            $newKey = str_replace(StorageRedisWrapper::KV_PREFIX . "translation:$storageIsoCode:", '', $key);
            $decodedValue = json_decode($value, true);
            $newValues[$newKey] = $decodedValue['value'];
        }

        return $newValues;
    }
}
