<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi\Dependency;

use ValanticSpryker\Client\GlossaryStorage\GlossaryStorageClient;

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
