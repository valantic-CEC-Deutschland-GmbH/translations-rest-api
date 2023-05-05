<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi\Plugin;

use Generated\Shared\Transfer\RestTranslationsResponseAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use ValanticSpryker\Glue\TranslationsRestApi\TranslationsRestApiConfig;

class TranslationsRestApiResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    private const TRANSLATION_CONTROLLER_NAME = 'translations-resource';

    /**
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet(Request::METHOD_GET, false);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return TranslationsRestApiConfig::TRANSLATION_RESOURCE_TYPE;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return self::TRANSLATION_CONTROLLER_NAME;
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestTranslationsResponseAttributesTransfer::class;
    }
}
