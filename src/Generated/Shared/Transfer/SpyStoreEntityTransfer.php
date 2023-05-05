<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use ArrayObject;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class SpyStoreEntityTransfer extends AbstractEntityTransfer
{
    /**
     * @var string
     */
    public const ID_STORE = 'idStore';

    /**
     * @var string
     */
    public const FK_CURRENCY = 'fkCurrency';

    /**
     * @var string
     */
    public const FK_LOCALE = 'fkLocale';

    /**
     * @var string
     */
    public const NAME = 'name';

    /**
     * @var string
     */
    public const DEFAULT_CURRENCY = 'defaultCurrency';

    /**
     * @var string
     */
    public const DEFAULT_LOCALE = 'defaultLocale';

    /**
     * @var string
     */
    public const SPY_CURRENCY_STORES = 'spyCurrencyStores';

    /**
     * @var string
     */
    public const SPY_LOCALE_STORES = 'spyLocaleStores';

    /**
     * @var string
     */
    public const SPY_TOUCH_STORAGES = 'spyTouchStorages';

    /**
     * @var string
     */
    public const SPY_TOUCH_SEARCHES = 'spyTouchSearches';

    /**
     * @var integer|null
     */
    protected $idStore;

    /**
     * @var integer|null
     */
    protected $fkCurrency;

    /**
     * @var integer|null
     */
    protected $fkLocale;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var \Generated\Shared\Transfer\SpyCurrencyEntityTransfer|null
     */
    protected $defaultCurrency;

    /**
     * @var \Generated\Shared\Transfer\SpyLocaleEntityTransfer|null
     */
    protected $defaultLocale;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer[]
     */
    protected $spyCurrencyStores;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyLocaleStoreEntityTransfer[]
     */
    protected $spyLocaleStores;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyTouchStorageEntityTransfer[]
     */
    protected $spyTouchStorages;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyTouchSearchEntityTransfer[]
     */
    protected $spyTouchSearches;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'id_store' => 'idStore',
        'idStore' => 'idStore',
        'IdStore' => 'idStore',
        'fk_currency' => 'fkCurrency',
        'fkCurrency' => 'fkCurrency',
        'FkCurrency' => 'fkCurrency',
        'fk_locale' => 'fkLocale',
        'fkLocale' => 'fkLocale',
        'FkLocale' => 'fkLocale',
        'name' => 'name',
        'Name' => 'name',
        'default_currency' => 'defaultCurrency',
        'defaultCurrency' => 'defaultCurrency',
        'DefaultCurrency' => 'defaultCurrency',
        'default_locale' => 'defaultLocale',
        'defaultLocale' => 'defaultLocale',
        'DefaultLocale' => 'defaultLocale',
        'spy_currency_stores' => 'spyCurrencyStores',
        'spyCurrencyStores' => 'spyCurrencyStores',
        'SpyCurrencyStores' => 'spyCurrencyStores',
        'spy_locale_stores' => 'spyLocaleStores',
        'spyLocaleStores' => 'spyLocaleStores',
        'SpyLocaleStores' => 'spyLocaleStores',
        'spy_touch_storages' => 'spyTouchStorages',
        'spyTouchStorages' => 'spyTouchStorages',
        'SpyTouchStorages' => 'spyTouchStorages',
        'spy_touch_searches' => 'spyTouchSearches',
        'spyTouchSearches' => 'spyTouchSearches',
        'SpyTouchSearches' => 'spyTouchSearches',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::ID_STORE => [
            'type' => 'integer',
            'type_shim' => null,
            'name_underscore' => 'id_store',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::FK_CURRENCY => [
            'type' => 'integer',
            'type_shim' => null,
            'name_underscore' => 'fk_currency',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::FK_LOCALE => [
            'type' => 'integer',
            'type_shim' => null,
            'name_underscore' => 'fk_locale',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::DEFAULT_CURRENCY => [
            'type' => 'Generated\Shared\Transfer\SpyCurrencyEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'default_currency',
            'is_collection' => false,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::DEFAULT_LOCALE => [
            'type' => 'Generated\Shared\Transfer\SpyLocaleEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'default_locale',
            'is_collection' => false,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SPY_CURRENCY_STORES => [
            'type' => 'Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'spy_currency_stores',
            'is_collection' => true,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SPY_LOCALE_STORES => [
            'type' => 'Generated\Shared\Transfer\SpyLocaleStoreEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'spy_locale_stores',
            'is_collection' => true,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SPY_TOUCH_STORAGES => [
            'type' => 'Generated\Shared\Transfer\SpyTouchStorageEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'spy_touch_storages',
            'is_collection' => true,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SPY_TOUCH_SEARCHES => [
            'type' => 'Generated\Shared\Transfer\SpyTouchSearchEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'spy_touch_searches',
            'is_collection' => true,
            'is_transfer' => true,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
    ];
    /**
     * @var string
     */
    public static $entityNamespace = 'Orm\Zed\Store\Persistence\SpyStore';


    /**
     * @module 
     *
     * @param integer|null $idStore
     *
     * @return $this
     */
    public function setIdStore($idStore)
    {
        $this->idStore = $idStore;
        $this->modifiedProperties[self::ID_STORE] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return integer|null
     */
    public function getIdStore()
    {
        return $this->idStore;
    }

    /**
     * @module 
     *
     * @param integer|null $idStore
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIdStoreOrFail($idStore)
    {
        if ($idStore === null) {
            $this->throwNullValueException(static::ID_STORE);
        }

        return $this->setIdStore($idStore);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return integer
     */
    public function getIdStoreOrFail()
    {
        if ($this->idStore === null) {
            $this->throwNullValueException(static::ID_STORE);
        }

        return $this->idStore;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireIdStore()
    {
        $this->assertPropertyIsSet(self::ID_STORE);

        return $this;
    }

    /**
     * @module 
     *
     * @param integer|null $fkCurrency
     *
     * @return $this
     */
    public function setFkCurrency($fkCurrency)
    {
        $this->fkCurrency = $fkCurrency;
        $this->modifiedProperties[self::FK_CURRENCY] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return integer|null
     */
    public function getFkCurrency()
    {
        return $this->fkCurrency;
    }

    /**
     * @module 
     *
     * @param integer|null $fkCurrency
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setFkCurrencyOrFail($fkCurrency)
    {
        if ($fkCurrency === null) {
            $this->throwNullValueException(static::FK_CURRENCY);
        }

        return $this->setFkCurrency($fkCurrency);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return integer
     */
    public function getFkCurrencyOrFail()
    {
        if ($this->fkCurrency === null) {
            $this->throwNullValueException(static::FK_CURRENCY);
        }

        return $this->fkCurrency;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireFkCurrency()
    {
        $this->assertPropertyIsSet(self::FK_CURRENCY);

        return $this;
    }

    /**
     * @module 
     *
     * @param integer|null $fkLocale
     *
     * @return $this
     */
    public function setFkLocale($fkLocale)
    {
        $this->fkLocale = $fkLocale;
        $this->modifiedProperties[self::FK_LOCALE] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return integer|null
     */
    public function getFkLocale()
    {
        return $this->fkLocale;
    }

    /**
     * @module 
     *
     * @param integer|null $fkLocale
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setFkLocaleOrFail($fkLocale)
    {
        if ($fkLocale === null) {
            $this->throwNullValueException(static::FK_LOCALE);
        }

        return $this->setFkLocale($fkLocale);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return integer
     */
    public function getFkLocaleOrFail()
    {
        if ($this->fkLocale === null) {
            $this->throwNullValueException(static::FK_LOCALE);
        }

        return $this->fkLocale;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireFkLocale()
    {
        $this->assertPropertyIsSet(self::FK_LOCALE);

        return $this;
    }

    /**
     * @module 
     *
     * @param string|null $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->modifiedProperties[self::NAME] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @module 
     *
     * @param string|null $name
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setNameOrFail($name)
    {
        if ($name === null) {
            $this->throwNullValueException(static::NAME);
        }

        return $this->setName($name);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getNameOrFail()
    {
        if ($this->name === null) {
            $this->throwNullValueException(static::NAME);
        }

        return $this->name;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireName()
    {
        $this->assertPropertyIsSet(self::NAME);

        return $this;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyCurrencyEntityTransfer|null $defaultCurrency
     *
     * @return $this
     */
    public function setDefaultCurrency(SpyCurrencyEntityTransfer $defaultCurrency = null)
    {
        $this->defaultCurrency = $defaultCurrency;
        $this->modifiedProperties[self::DEFAULT_CURRENCY] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \Generated\Shared\Transfer\SpyCurrencyEntityTransfer|null
     */
    public function getDefaultCurrency()
    {
        return $this->defaultCurrency;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyCurrencyEntityTransfer $defaultCurrency
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setDefaultCurrencyOrFail(SpyCurrencyEntityTransfer $defaultCurrency)
    {
        return $this->setDefaultCurrency($defaultCurrency);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return \Generated\Shared\Transfer\SpyCurrencyEntityTransfer
     */
    public function getDefaultCurrencyOrFail()
    {
        if ($this->defaultCurrency === null) {
            $this->throwNullValueException(static::DEFAULT_CURRENCY);
        }

        return $this->defaultCurrency;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireDefaultCurrency()
    {
        $this->assertPropertyIsSet(self::DEFAULT_CURRENCY);

        return $this;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyLocaleEntityTransfer|null $defaultLocale
     *
     * @return $this
     */
    public function setDefaultLocale(SpyLocaleEntityTransfer $defaultLocale = null)
    {
        $this->defaultLocale = $defaultLocale;
        $this->modifiedProperties[self::DEFAULT_LOCALE] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \Generated\Shared\Transfer\SpyLocaleEntityTransfer|null
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyLocaleEntityTransfer $defaultLocale
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setDefaultLocaleOrFail(SpyLocaleEntityTransfer $defaultLocale)
    {
        return $this->setDefaultLocale($defaultLocale);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return \Generated\Shared\Transfer\SpyLocaleEntityTransfer
     */
    public function getDefaultLocaleOrFail()
    {
        if ($this->defaultLocale === null) {
            $this->throwNullValueException(static::DEFAULT_LOCALE);
        }

        return $this->defaultLocale;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireDefaultLocale()
    {
        $this->assertPropertyIsSet(self::DEFAULT_LOCALE);

        return $this;
    }

    /**
     * @module 
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer[] $spyCurrencyStores
     *
     * @return $this
     */
    public function setSpyCurrencyStores(ArrayObject $spyCurrencyStores)
    {
        $this->spyCurrencyStores = $spyCurrencyStores;
        $this->modifiedProperties[self::SPY_CURRENCY_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer[]
     */
    public function getSpyCurrencyStores()
    {
        return $this->spyCurrencyStores;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer $spyCurrencyStores
     *
     * @return $this
     */
    public function addSpyCurrencyStores(SpyCurrencyStoreEntityTransfer $spyCurrencyStores)
    {
        $this->spyCurrencyStores[] = $spyCurrencyStores;
        $this->modifiedProperties[self::SPY_CURRENCY_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSpyCurrencyStores()
    {
        $this->assertCollectionPropertyIsSet(self::SPY_CURRENCY_STORES);

        return $this;
    }

    /**
     * @module 
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\SpyLocaleStoreEntityTransfer[] $spyLocaleStores
     *
     * @return $this
     */
    public function setSpyLocaleStores(ArrayObject $spyLocaleStores)
    {
        $this->spyLocaleStores = $spyLocaleStores;
        $this->modifiedProperties[self::SPY_LOCALE_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\SpyLocaleStoreEntityTransfer[]
     */
    public function getSpyLocaleStores()
    {
        return $this->spyLocaleStores;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyLocaleStoreEntityTransfer $spyLocaleStores
     *
     * @return $this
     */
    public function addSpyLocaleStores(SpyLocaleStoreEntityTransfer $spyLocaleStores)
    {
        $this->spyLocaleStores[] = $spyLocaleStores;
        $this->modifiedProperties[self::SPY_LOCALE_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSpyLocaleStores()
    {
        $this->assertCollectionPropertyIsSet(self::SPY_LOCALE_STORES);

        return $this;
    }

    /**
     * @module 
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\SpyTouchStorageEntityTransfer[] $spyTouchStorages
     *
     * @return $this
     */
    public function setSpyTouchStorages(ArrayObject $spyTouchStorages)
    {
        $this->spyTouchStorages = $spyTouchStorages;
        $this->modifiedProperties[self::SPY_TOUCH_STORAGES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\SpyTouchStorageEntityTransfer[]
     */
    public function getSpyTouchStorages()
    {
        return $this->spyTouchStorages;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyTouchStorageEntityTransfer $spyTouchStorages
     *
     * @return $this
     */
    public function addSpyTouchStorages(SpyTouchStorageEntityTransfer $spyTouchStorages)
    {
        $this->spyTouchStorages[] = $spyTouchStorages;
        $this->modifiedProperties[self::SPY_TOUCH_STORAGES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSpyTouchStorages()
    {
        $this->assertCollectionPropertyIsSet(self::SPY_TOUCH_STORAGES);

        return $this;
    }

    /**
     * @module 
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\SpyTouchSearchEntityTransfer[] $spyTouchSearches
     *
     * @return $this
     */
    public function setSpyTouchSearches(ArrayObject $spyTouchSearches)
    {
        $this->spyTouchSearches = $spyTouchSearches;
        $this->modifiedProperties[self::SPY_TOUCH_SEARCHES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\SpyTouchSearchEntityTransfer[]
     */
    public function getSpyTouchSearches()
    {
        return $this->spyTouchSearches;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyTouchSearchEntityTransfer $spyTouchSearches
     *
     * @return $this
     */
    public function addSpyTouchSearches(SpyTouchSearchEntityTransfer $spyTouchSearches)
    {
        $this->spyTouchSearches[] = $spyTouchSearches;
        $this->modifiedProperties[self::SPY_TOUCH_SEARCHES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSpyTouchSearches()
    {
        $this->assertCollectionPropertyIsSet(self::SPY_TOUCH_SEARCHES);

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
                case 'idStore':
                case 'fkCurrency':
                case 'fkLocale':
                case 'name':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                case 'defaultCurrency':
                case 'defaultLocale':
                    if (is_array($value)) {
                        $type = $this->transferMetadata[$normalizedPropertyName]['type'];
                        /** @var \Spryker\Shared\Kernel\Transfer\TransferInterface $value */
                        $value = (new $type())->fromArray($value, $ignoreMissingProperty);
                    }

                    if ($value !== null && $this->isPropertyStrict($normalizedPropertyName)) {
                        $this->assertInstanceOfTransfer($normalizedPropertyName, $value);
                    }
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                case 'spyCurrencyStores':
                case 'spyLocaleStores':
                case 'spyTouchStorages':
                case 'spyTouchSearches':
                    $elementType = $this->transferMetadata[$normalizedPropertyName]['type'];
                    $this->$normalizedPropertyName = $this->processArrayObject($elementType, $value, $ignoreMissingProperty);
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                default:
                    if (!$ignoreMissingProperty) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
                    $this->virtualProperties[$property] = $value;
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
                case 'idStore':
                case 'fkCurrency':
                case 'fkLocale':
                case 'name':
                    $values[$arrayKey] = $value;

                    break;
                case 'defaultCurrency':
                case 'defaultLocale':
                    $values[$arrayKey] = $value instanceof AbstractTransfer ? $value->modifiedToArray(true, true) : $value;

                    break;
                case 'spyCurrencyStores':
                case 'spyLocaleStores':
                case 'spyTouchStorages':
                case 'spyTouchSearches':
                    $values[$arrayKey] = $value ? $this->addValuesToCollectionModified($value, true, true) : $value;

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
                case 'idStore':
                case 'fkCurrency':
                case 'fkLocale':
                case 'name':
                    $values[$arrayKey] = $value;

                    break;
                case 'defaultCurrency':
                case 'defaultLocale':
                    $values[$arrayKey] = $value instanceof AbstractTransfer ? $value->modifiedToArray(true, false) : $value;

                    break;
                case 'spyCurrencyStores':
                case 'spyLocaleStores':
                case 'spyTouchStorages':
                case 'spyTouchSearches':
                    $values[$arrayKey] = $value ? $this->addValuesToCollectionModified($value, true, false) : $value;

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
        $this->spyCurrencyStores = $this->spyCurrencyStores ?: new ArrayObject();
        $this->spyLocaleStores = $this->spyLocaleStores ?: new ArrayObject();
        $this->spyTouchStorages = $this->spyTouchStorages ?: new ArrayObject();
        $this->spyTouchSearches = $this->spyTouchSearches ?: new ArrayObject();
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveCamelCased(): array
    {
        return [
            'idStore' => $this->idStore,
            'fkCurrency' => $this->fkCurrency,
            'fkLocale' => $this->fkLocale,
            'name' => $this->name,
            'defaultCurrency' => $this->defaultCurrency,
            'defaultLocale' => $this->defaultLocale,
            'spyCurrencyStores' => $this->spyCurrencyStores,
            'spyLocaleStores' => $this->spyLocaleStores,
            'spyTouchStorages' => $this->spyTouchStorages,
            'spyTouchSearches' => $this->spyTouchSearches,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'id_store' => $this->idStore,
            'fk_currency' => $this->fkCurrency,
            'fk_locale' => $this->fkLocale,
            'name' => $this->name,
            'default_currency' => $this->defaultCurrency,
            'default_locale' => $this->defaultLocale,
            'spy_currency_stores' => $this->spyCurrencyStores,
            'spy_locale_stores' => $this->spyLocaleStores,
            'spy_touch_storages' => $this->spyTouchStorages,
            'spy_touch_searches' => $this->spyTouchSearches,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'id_store' => $this->idStore instanceof AbstractTransfer ? $this->idStore->toArray(true, false) : $this->idStore,
            'fk_currency' => $this->fkCurrency instanceof AbstractTransfer ? $this->fkCurrency->toArray(true, false) : $this->fkCurrency,
            'fk_locale' => $this->fkLocale instanceof AbstractTransfer ? $this->fkLocale->toArray(true, false) : $this->fkLocale,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, false) : $this->name,
            'default_currency' => $this->defaultCurrency instanceof AbstractTransfer ? $this->defaultCurrency->toArray(true, false) : $this->defaultCurrency,
            'default_locale' => $this->defaultLocale instanceof AbstractTransfer ? $this->defaultLocale->toArray(true, false) : $this->defaultLocale,
            'spy_currency_stores' => $this->spyCurrencyStores instanceof AbstractTransfer ? $this->spyCurrencyStores->toArray(true, false) : $this->addValuesToCollection($this->spyCurrencyStores, true, false),
            'spy_locale_stores' => $this->spyLocaleStores instanceof AbstractTransfer ? $this->spyLocaleStores->toArray(true, false) : $this->addValuesToCollection($this->spyLocaleStores, true, false),
            'spy_touch_storages' => $this->spyTouchStorages instanceof AbstractTransfer ? $this->spyTouchStorages->toArray(true, false) : $this->addValuesToCollection($this->spyTouchStorages, true, false),
            'spy_touch_searches' => $this->spyTouchSearches instanceof AbstractTransfer ? $this->spyTouchSearches->toArray(true, false) : $this->addValuesToCollection($this->spyTouchSearches, true, false),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'idStore' => $this->idStore instanceof AbstractTransfer ? $this->idStore->toArray(true, true) : $this->idStore,
            'fkCurrency' => $this->fkCurrency instanceof AbstractTransfer ? $this->fkCurrency->toArray(true, true) : $this->fkCurrency,
            'fkLocale' => $this->fkLocale instanceof AbstractTransfer ? $this->fkLocale->toArray(true, true) : $this->fkLocale,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, true) : $this->name,
            'defaultCurrency' => $this->defaultCurrency instanceof AbstractTransfer ? $this->defaultCurrency->toArray(true, true) : $this->defaultCurrency,
            'defaultLocale' => $this->defaultLocale instanceof AbstractTransfer ? $this->defaultLocale->toArray(true, true) : $this->defaultLocale,
            'spyCurrencyStores' => $this->spyCurrencyStores instanceof AbstractTransfer ? $this->spyCurrencyStores->toArray(true, true) : $this->addValuesToCollection($this->spyCurrencyStores, true, true),
            'spyLocaleStores' => $this->spyLocaleStores instanceof AbstractTransfer ? $this->spyLocaleStores->toArray(true, true) : $this->addValuesToCollection($this->spyLocaleStores, true, true),
            'spyTouchStorages' => $this->spyTouchStorages instanceof AbstractTransfer ? $this->spyTouchStorages->toArray(true, true) : $this->addValuesToCollection($this->spyTouchStorages, true, true),
            'spyTouchSearches' => $this->spyTouchSearches instanceof AbstractTransfer ? $this->spyTouchSearches->toArray(true, true) : $this->addValuesToCollection($this->spyTouchSearches, true, true),
        ];
    }
}
