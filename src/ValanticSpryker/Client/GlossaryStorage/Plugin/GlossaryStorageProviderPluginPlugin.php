<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\GlossaryStorage\Plugin;

use Spryker\Client\Kernel\AbstractPlugin;
use ValanticSpryker\Glue\TranslationsRestApi\Dependency\TranslationsProviderPluginInterface;

/**
 * @method \ValanticSpryker\Client\GlossaryStorage\GlossaryStorageClientInterface getClient()
 */
class GlossaryStorageProviderPluginPlugin extends AbstractPlugin implements TranslationsProviderPluginInterface
{
    /**
     * @param string $localeIsoCode
     *
     * @return array
     */
    public function provide(string $localeIsoCode): array
    {
        return $this->getClient()->getTranslations($localeIsoCode);
    }
}
