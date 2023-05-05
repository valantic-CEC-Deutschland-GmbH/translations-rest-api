<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class PaginationTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const LIMIT = 'limit';

    /**
     * @var string
     */
    public const OFFSET = 'offset';

    /**
     * @var string
     */
    public const PAGE = 'page';

    /**
     * @var string
     */
    public const MAX_PER_PAGE = 'maxPerPage';

    /**
     * @var string
     */
    public const NB_RESULTS = 'nbResults';

    /**
     * @var string
     */
    public const PREVIOUS_PAGE = 'previousPage';

    /**
     * @var string
     */
    public const NEXT_PAGE = 'nextPage';

    /**
     * @var string
     */
    public const FIRST_INDEX = 'firstIndex';

    /**
     * @var string
     */
    public const LAST_INDEX = 'lastIndex';

    /**
     * @var string
     */
    public const FIRST_PAGE = 'firstPage';

    /**
     * @var string
     */
    public const LAST_PAGE = 'lastPage';

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int|null
     */
    protected $offset;

    /**
     * @var int|null
     */
    protected $page;

    /**
     * @var int|null
     */
    protected $maxPerPage;

    /**
     * @var int|null
     */
    protected $nbResults;

    /**
     * @var int|null
     */
    protected $previousPage;

    /**
     * @var int|null
     */
    protected $nextPage;

    /**
     * @var int|null
     */
    protected $firstIndex;

    /**
     * @var int|null
     */
    protected $lastIndex;

    /**
     * @var int|null
     */
    protected $firstPage;

    /**
     * @var int|null
     */
    protected $lastPage;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'limit' => 'limit',
        'Limit' => 'limit',
        'offset' => 'offset',
        'Offset' => 'offset',
        'page' => 'page',
        'Page' => 'page',
        'max_per_page' => 'maxPerPage',
        'maxPerPage' => 'maxPerPage',
        'MaxPerPage' => 'maxPerPage',
        'nb_results' => 'nbResults',
        'nbResults' => 'nbResults',
        'NbResults' => 'nbResults',
        'previous_page' => 'previousPage',
        'previousPage' => 'previousPage',
        'PreviousPage' => 'previousPage',
        'next_page' => 'nextPage',
        'nextPage' => 'nextPage',
        'NextPage' => 'nextPage',
        'first_index' => 'firstIndex',
        'firstIndex' => 'firstIndex',
        'FirstIndex' => 'firstIndex',
        'last_index' => 'lastIndex',
        'lastIndex' => 'lastIndex',
        'LastIndex' => 'lastIndex',
        'first_page' => 'firstPage',
        'firstPage' => 'firstPage',
        'FirstPage' => 'firstPage',
        'last_page' => 'lastPage',
        'lastPage' => 'lastPage',
        'LastPage' => 'lastPage',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::LIMIT => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'limit',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::OFFSET => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'offset',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::MAX_PER_PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'max_per_page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::NB_RESULTS => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'nb_results',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PREVIOUS_PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'previous_page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::NEXT_PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'next_page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::FIRST_INDEX => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'first_index',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::LAST_INDEX => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'last_index',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::FIRST_PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'first_page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::LAST_PAGE => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'last_page',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
    ];

    /**
     * @module Currency|Store
     *
     * @param int|null $limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        $this->modifiedProperties[self::LIMIT] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $limit
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setLimitOrFail($limit)
    {
        if ($limit === null) {
            $this->throwNullValueException(static::LIMIT);
        }

        return $this->setLimit($limit);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getLimitOrFail()
    {
        if ($this->limit === null) {
            $this->throwNullValueException(static::LIMIT);
        }

        return $this->limit;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireLimit()
    {
        $this->assertPropertyIsSet(self::LIMIT);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $offset
     *
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        $this->modifiedProperties[self::OFFSET] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $offset
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setOffsetOrFail($offset)
    {
        if ($offset === null) {
            $this->throwNullValueException(static::OFFSET);
        }

        return $this->setOffset($offset);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getOffsetOrFail()
    {
        if ($this->offset === null) {
            $this->throwNullValueException(static::OFFSET);
        }

        return $this->offset;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireOffset()
    {
        $this->assertPropertyIsSet(self::OFFSET);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $page
     *
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        $this->modifiedProperties[self::PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $page
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPageOrFail($page)
    {
        if ($page === null) {
            $this->throwNullValueException(static::PAGE);
        }

        return $this->setPage($page);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getPageOrFail()
    {
        if ($this->page === null) {
            $this->throwNullValueException(static::PAGE);
        }

        return $this->page;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePage()
    {
        $this->assertPropertyIsSet(self::PAGE);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $maxPerPage
     *
     * @return $this
     */
    public function setMaxPerPage($maxPerPage)
    {
        $this->maxPerPage = $maxPerPage;
        $this->modifiedProperties[self::MAX_PER_PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getMaxPerPage()
    {
        return $this->maxPerPage;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $maxPerPage
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setMaxPerPageOrFail($maxPerPage)
    {
        if ($maxPerPage === null) {
            $this->throwNullValueException(static::MAX_PER_PAGE);
        }

        return $this->setMaxPerPage($maxPerPage);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getMaxPerPageOrFail()
    {
        if ($this->maxPerPage === null) {
            $this->throwNullValueException(static::MAX_PER_PAGE);
        }

        return $this->maxPerPage;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireMaxPerPage()
    {
        $this->assertPropertyIsSet(self::MAX_PER_PAGE);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $nbResults
     *
     * @return $this
     */
    public function setNbResults($nbResults)
    {
        $this->nbResults = $nbResults;
        $this->modifiedProperties[self::NB_RESULTS] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getNbResults()
    {
        return $this->nbResults;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $nbResults
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setNbResultsOrFail($nbResults)
    {
        if ($nbResults === null) {
            $this->throwNullValueException(static::NB_RESULTS);
        }

        return $this->setNbResults($nbResults);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getNbResultsOrFail()
    {
        if ($this->nbResults === null) {
            $this->throwNullValueException(static::NB_RESULTS);
        }

        return $this->nbResults;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireNbResults()
    {
        $this->assertPropertyIsSet(self::NB_RESULTS);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $previousPage
     *
     * @return $this
     */
    public function setPreviousPage($previousPage)
    {
        $this->previousPage = $previousPage;
        $this->modifiedProperties[self::PREVIOUS_PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getPreviousPage()
    {
        return $this->previousPage;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $previousPage
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPreviousPageOrFail($previousPage)
    {
        if ($previousPage === null) {
            $this->throwNullValueException(static::PREVIOUS_PAGE);
        }

        return $this->setPreviousPage($previousPage);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getPreviousPageOrFail()
    {
        if ($this->previousPage === null) {
            $this->throwNullValueException(static::PREVIOUS_PAGE);
        }

        return $this->previousPage;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePreviousPage()
    {
        $this->assertPropertyIsSet(self::PREVIOUS_PAGE);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $nextPage
     *
     * @return $this
     */
    public function setNextPage($nextPage)
    {
        $this->nextPage = $nextPage;
        $this->modifiedProperties[self::NEXT_PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getNextPage()
    {
        return $this->nextPage;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $nextPage
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setNextPageOrFail($nextPage)
    {
        if ($nextPage === null) {
            $this->throwNullValueException(static::NEXT_PAGE);
        }

        return $this->setNextPage($nextPage);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getNextPageOrFail()
    {
        if ($this->nextPage === null) {
            $this->throwNullValueException(static::NEXT_PAGE);
        }

        return $this->nextPage;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireNextPage()
    {
        $this->assertPropertyIsSet(self::NEXT_PAGE);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $firstIndex
     *
     * @return $this
     */
    public function setFirstIndex($firstIndex)
    {
        $this->firstIndex = $firstIndex;
        $this->modifiedProperties[self::FIRST_INDEX] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getFirstIndex()
    {
        return $this->firstIndex;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $firstIndex
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setFirstIndexOrFail($firstIndex)
    {
        if ($firstIndex === null) {
            $this->throwNullValueException(static::FIRST_INDEX);
        }

        return $this->setFirstIndex($firstIndex);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getFirstIndexOrFail()
    {
        if ($this->firstIndex === null) {
            $this->throwNullValueException(static::FIRST_INDEX);
        }

        return $this->firstIndex;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireFirstIndex()
    {
        $this->assertPropertyIsSet(self::FIRST_INDEX);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $lastIndex
     *
     * @return $this
     */
    public function setLastIndex($lastIndex)
    {
        $this->lastIndex = $lastIndex;
        $this->modifiedProperties[self::LAST_INDEX] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getLastIndex()
    {
        return $this->lastIndex;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $lastIndex
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setLastIndexOrFail($lastIndex)
    {
        if ($lastIndex === null) {
            $this->throwNullValueException(static::LAST_INDEX);
        }

        return $this->setLastIndex($lastIndex);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getLastIndexOrFail()
    {
        if ($this->lastIndex === null) {
            $this->throwNullValueException(static::LAST_INDEX);
        }

        return $this->lastIndex;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireLastIndex()
    {
        $this->assertPropertyIsSet(self::LAST_INDEX);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $firstPage
     *
     * @return $this
     */
    public function setFirstPage($firstPage)
    {
        $this->firstPage = $firstPage;
        $this->modifiedProperties[self::FIRST_PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getFirstPage()
    {
        return $this->firstPage;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $firstPage
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setFirstPageOrFail($firstPage)
    {
        if ($firstPage === null) {
            $this->throwNullValueException(static::FIRST_PAGE);
        }

        return $this->setFirstPage($firstPage);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getFirstPageOrFail()
    {
        if ($this->firstPage === null) {
            $this->throwNullValueException(static::FIRST_PAGE);
        }

        return $this->firstPage;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireFirstPage()
    {
        $this->assertPropertyIsSet(self::FIRST_PAGE);

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $lastPage
     *
     * @return $this
     */
    public function setLastPage($lastPage)
    {
        $this->lastPage = $lastPage;
        $this->modifiedProperties[self::LAST_PAGE] = true;

        return $this;
    }

    /**
     * @module Currency|Store
     *
     * @return int|null
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }

    /**
     * @module Currency|Store
     *
     * @param int|null $lastPage
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setLastPageOrFail($lastPage)
    {
        if ($lastPage === null) {
            $this->throwNullValueException(static::LAST_PAGE);
        }

        return $this->setLastPage($lastPage);
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getLastPageOrFail()
    {
        if ($this->lastPage === null) {
            $this->throwNullValueException(static::LAST_PAGE);
        }

        return $this->lastPage;
    }

    /**
     * @module Currency|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireLastPage()
    {
        $this->assertPropertyIsSet(self::LAST_PAGE);

        return $this;
    }

    /**
     * @param array<string, mixed> $data
     * @param bool $ignoreMissingProperty
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function fromArray(array $data, $ignoreMissingProperty = false)
    {
        foreach ($data as $property => $value) {
            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;

            switch ($normalizedPropertyName) {
                case 'limit':
                case 'offset':
                case 'page':
                case 'maxPerPage':
                case 'nbResults':
                case 'previousPage':
                case 'nextPage':
                case 'firstIndex':
                case 'lastIndex':
                case 'firstPage':
                case 'lastPage':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                default:
                    if (!$ignoreMissingProperty) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }

    /**
     * @param bool $isRecursive
     * @param bool $camelCasedKeys
     *
     * @return array<string, mixed>
     */
    public function modifiedToArray($isRecursive = true, $camelCasedKeys = false): array
    {
        if ($isRecursive && !$camelCasedKeys) {
            return $this->modifiedToArrayRecursiveNotCamelCased();
        }
        if ($isRecursive && $camelCasedKeys) {
            return $this->modifiedToArrayRecursiveCamelCased();
        }
        if (!$isRecursive && $camelCasedKeys) {
            return $this->modifiedToArrayNotRecursiveCamelCased();
        }
        if (!$isRecursive && !$camelCasedKeys) {
            return $this->modifiedToArrayNotRecursiveNotCamelCased();
        }
    }

    /**
     * @param bool $isRecursive
     * @param bool $camelCasedKeys
     *
     * @return array<string, mixed>
     */
    public function toArray($isRecursive = true, $camelCasedKeys = false): array
    {
        if ($isRecursive && !$camelCasedKeys) {
            return $this->toArrayRecursiveNotCamelCased();
        }
        if ($isRecursive && $camelCasedKeys) {
            return $this->toArrayRecursiveCamelCased();
        }
        if (!$isRecursive && !$camelCasedKeys) {
            return $this->toArrayNotRecursiveNotCamelCased();
        }
        if (!$isRecursive && $camelCasedKeys) {
            return $this->toArrayNotRecursiveCamelCased();
        }
    }

    /**
     * @param array<string, mixed>|\ArrayObject<string, mixed> $value
     * @param bool $isRecursive
     * @param bool $camelCasedKeys
     *
     * @return array<string, mixed>
     */
    protected function addValuesToCollectionModified($value, $isRecursive, $camelCasedKeys): array
    {
        $result = [];
        foreach ($value as $elementKey => $arrayElement) {
            if ($arrayElement instanceof AbstractTransfer) {
                $result[$elementKey] = $arrayElement->modifiedToArray($isRecursive, $camelCasedKeys);

                continue;
            }
            $result[$elementKey] = $arrayElement;
        }

        return $result;
    }

    /**
     * @param array<string, mixed>|\ArrayObject<string, mixed> $value
     * @param bool $isRecursive
     * @param bool $camelCasedKeys
     *
     * @return array<string, mixed>
     */
    protected function addValuesToCollection($value, $isRecursive, $camelCasedKeys): array
    {
        $result = [];
        foreach ($value as $elementKey => $arrayElement) {
            if ($arrayElement instanceof AbstractTransfer) {
                $result[$elementKey] = $arrayElement->toArray($isRecursive, $camelCasedKeys);

                continue;
            }
            $result[$elementKey] = $arrayElement;
        }

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function modifiedToArrayRecursiveCamelCased(): array
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $property;

            if ($value instanceof AbstractTransfer) {
                $values[$arrayKey] = $value->modifiedToArray(true, true);

                continue;
            }
            switch ($property) {
                case 'limit':
                case 'offset':
                case 'page':
                case 'maxPerPage':
                case 'nbResults':
                case 'previousPage':
                case 'nextPage':
                case 'firstIndex':
                case 'lastIndex':
                case 'firstPage':
                case 'lastPage':
                    $values[$arrayKey] = $value;

                    break;
            }
        }

        return $values;
    }

    /**
     * @return array<string, mixed>
     */
    public function modifiedToArrayRecursiveNotCamelCased(): array
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $this->transferMetadata[$property]['name_underscore'];

            if ($value instanceof AbstractTransfer) {
                $values[$arrayKey] = $value->modifiedToArray(true, false);

                continue;
            }
            switch ($property) {
                case 'limit':
                case 'offset':
                case 'page':
                case 'maxPerPage':
                case 'nbResults':
                case 'previousPage':
                case 'nextPage':
                case 'firstIndex':
                case 'lastIndex':
                case 'firstPage':
                case 'lastPage':
                    $values[$arrayKey] = $value;

                    break;
            }
        }

        return $values;
    }

    /**
     * @return array<string, mixed>
     */
    public function modifiedToArrayNotRecursiveNotCamelCased(): array
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $this->transferMetadata[$property]['name_underscore'];

            $values[$arrayKey] = $value;
        }

        return $values;
    }

    /**
     * @return array<string, mixed>
     */
    public function modifiedToArrayNotRecursiveCamelCased(): array
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $property;

            $values[$arrayKey] = $value;
        }

        return $values;
    }

    /**
     * @return void
     */
    protected function initCollectionProperties(): void
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveCamelCased(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'page' => $this->page,
            'maxPerPage' => $this->maxPerPage,
            'nbResults' => $this->nbResults,
            'previousPage' => $this->previousPage,
            'nextPage' => $this->nextPage,
            'firstIndex' => $this->firstIndex,
            'lastIndex' => $this->lastIndex,
            'firstPage' => $this->firstPage,
            'lastPage' => $this->lastPage,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'page' => $this->page,
            'max_per_page' => $this->maxPerPage,
            'nb_results' => $this->nbResults,
            'previous_page' => $this->previousPage,
            'next_page' => $this->nextPage,
            'first_index' => $this->firstIndex,
            'last_index' => $this->lastIndex,
            'first_page' => $this->firstPage,
            'last_page' => $this->lastPage,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'limit' => $this->limit instanceof AbstractTransfer ? $this->limit->toArray(true, false) : $this->limit,
            'offset' => $this->offset instanceof AbstractTransfer ? $this->offset->toArray(true, false) : $this->offset,
            'page' => $this->page instanceof AbstractTransfer ? $this->page->toArray(true, false) : $this->page,
            'max_per_page' => $this->maxPerPage instanceof AbstractTransfer ? $this->maxPerPage->toArray(true, false) : $this->maxPerPage,
            'nb_results' => $this->nbResults instanceof AbstractTransfer ? $this->nbResults->toArray(true, false) : $this->nbResults,
            'previous_page' => $this->previousPage instanceof AbstractTransfer ? $this->previousPage->toArray(true, false) : $this->previousPage,
            'next_page' => $this->nextPage instanceof AbstractTransfer ? $this->nextPage->toArray(true, false) : $this->nextPage,
            'first_index' => $this->firstIndex instanceof AbstractTransfer ? $this->firstIndex->toArray(true, false) : $this->firstIndex,
            'last_index' => $this->lastIndex instanceof AbstractTransfer ? $this->lastIndex->toArray(true, false) : $this->lastIndex,
            'first_page' => $this->firstPage instanceof AbstractTransfer ? $this->firstPage->toArray(true, false) : $this->firstPage,
            'last_page' => $this->lastPage instanceof AbstractTransfer ? $this->lastPage->toArray(true, false) : $this->lastPage,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'limit' => $this->limit instanceof AbstractTransfer ? $this->limit->toArray(true, true) : $this->limit,
            'offset' => $this->offset instanceof AbstractTransfer ? $this->offset->toArray(true, true) : $this->offset,
            'page' => $this->page instanceof AbstractTransfer ? $this->page->toArray(true, true) : $this->page,
            'maxPerPage' => $this->maxPerPage instanceof AbstractTransfer ? $this->maxPerPage->toArray(true, true) : $this->maxPerPage,
            'nbResults' => $this->nbResults instanceof AbstractTransfer ? $this->nbResults->toArray(true, true) : $this->nbResults,
            'previousPage' => $this->previousPage instanceof AbstractTransfer ? $this->previousPage->toArray(true, true) : $this->previousPage,
            'nextPage' => $this->nextPage instanceof AbstractTransfer ? $this->nextPage->toArray(true, true) : $this->nextPage,
            'firstIndex' => $this->firstIndex instanceof AbstractTransfer ? $this->firstIndex->toArray(true, true) : $this->firstIndex,
            'lastIndex' => $this->lastIndex instanceof AbstractTransfer ? $this->lastIndex->toArray(true, true) : $this->lastIndex,
            'firstPage' => $this->firstPage instanceof AbstractTransfer ? $this->firstPage->toArray(true, true) : $this->firstPage,
            'lastPage' => $this->lastPage instanceof AbstractTransfer ? $this->lastPage->toArray(true, true) : $this->lastPage,
        ];
    }
}
