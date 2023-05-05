<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi\Dependency;

interface TranslationsProviderPluginInterface
{
    /**
     * @param string $localeIsoCode
     *
     * @return array
     */
    public function provide(string $localeIsoCode): array;
}
