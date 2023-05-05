<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage;

use Spryker\Client\GlossaryStorage\GlossaryStorageClientInterface as SprykerGlossaryStorageClientInterface;

interface GlossaryStorageClientInterface extends SprykerGlossaryStorageClientInterface
{
    /**
     * @param string $isoCode
     *
     * @return array
     */
    public function getTranslations(string $isoCode): array;
}
