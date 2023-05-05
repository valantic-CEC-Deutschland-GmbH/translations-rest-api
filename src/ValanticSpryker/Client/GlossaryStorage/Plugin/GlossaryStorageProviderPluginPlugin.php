<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage\Plugin;

use ValanticSpryker\Client\GlossaryStorage\GlossaryStorageClient;
use ValanticSpryker\Glue\TranslationsRestApi\Dependency\TranslationsProviderPluginInterface;

class GlossaryStorageProviderPluginPlugin implements TranslationsProviderPluginInterface
{
    /**
     * @param \ValanticSpryker\Client\GlossaryStorage\GlossaryStorageClient $glossaryStorageClient
     */
    public function __construct(
        private GlossaryStorageClient $glossaryStorageClient
    ) {
    }

    /**
     * @param string $localeIsoCode
     *
     * @return array
     */
    public function provide(string $localeIsoCode): array
    {
        return $this->glossaryStorageClient->getTranslations($localeIsoCode);
    }
}
