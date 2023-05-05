<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\TranslationsRestApi\Controller;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \ValanticSpryker\Glue\TranslationsRestApi\TranslationsRestApiFactory getFactory()
 */
class TranslationsResourceController extends AbstractController
{
    /**
     * @Glue({
     *     "getResourceById ": {
     *          "summary": [
     *              "Retrieves translations based on firstspiritContentMode and locale"
     *          ],
     *          "parameters": [
     *              {
     *                  "name": "Accept-Language",
     *                  "in": "header",
     *                  "required": false
     *              },
     *              {
     *                  "name": "If-None-Match",
     *                  "in": "header",
     *                  "required": false
     *              },
     *              {
     *                  "name": "firstspiritContentMode",
     *                  "description": "`release` or `preview`",
     *                  "in": "query",
     *                  "required": false
     *              }
     *          ],
     *          "responses": {
     *              "200": "Requested resource found in Cache or First Spirit API",
     *              "304": "Requested resource has not been modified",
     *              "404": "Resource not found",
     *              "500": "Internal server problem"
     *          }
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()
            ->createTranslationsRestApiProcessor()
            ->process($restRequest);
    }
}
