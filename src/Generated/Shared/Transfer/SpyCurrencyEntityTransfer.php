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
class SpyCurrencyEntityTransfer extends AbstractEntityTransfer
{
    /**
     * @var string
     */
    public const ID_CURRENCY = 'idCurrency';

    /**
     * @var string
     */
    public const NAME = 'name';

    /**
     * @var string
     */
    public const CODE = 'code';

    /**
     * @var string
     */
    public const SYMBOL = 'symbol';

    /**
     * @var string
     */
    public const SPY_STORES = 'spyStores';

    /**
     * @var string
     */
    public const SPY_CURRENCY_STORES = 'spyCurrencyStores';

    /**
     * @var integer|null
     */
    protected $idCurrency;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $code;

    /**
     * @var string|null
     */
    protected $symbol;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyStoreEntityTransfer[]
     */
    protected $spyStores;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\SpyCurrencyStoreEntityTransfer[]
     */
    protected $spyCurrencyStores;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'id_currency' => 'idCurrency',
        'idCurrency' => 'idCurrency',
        'IdCurrency' => 'idCurrency',
        'name' => 'name',
        'Name' => 'name',
        'code' => 'code',
        'Code' => 'code',
        'symbol' => 'symbol',
        'Symbol' => 'symbol',
        'spy_stores' => 'spyStores',
        'spyStores' => 'spyStores',
        'SpyStores' => 'spyStores',
        'spy_currency_stores' => 'spyCurrencyStores',
        'spyCurrencyStores' => 'spyCurrencyStores',
        'SpyCurrencyStores' => 'spyCurrencyStores',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::ID_CURRENCY => [
            'type' => 'integer',
            'type_shim' => null,
            'name_underscore' => 'id_currency',
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
        self::CODE => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'code',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SYMBOL => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'symbol',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SPY_STORES => [
            'type' => 'Generated\Shared\Transfer\SpyStoreEntityTransfer',
            'type_shim' => null,
            'name_underscore' => 'spy_stores',
            'is_collection' => true,
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
    ];
    /**
     * @var string
     */
    public static $entityNamespace = 'Orm\Zed\Currency\Persistence\SpyCurrency';


    /**
     * @module 
     *
     * @param integer|null $idCurrency
     *
     * @return $this
     */
    public function setIdCurrency($idCurrency)
    {
        $this->idCurrency = $idCurrency;
        $this->modifiedProperties[self::ID_CURRENCY] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return integer|null
     */
    public function getIdCurrency()
    {
        return $this->idCurrency;
    }

    /**
     * @module 
     *
     * @param integer|null $idCurrency
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIdCurrencyOrFail($idCurrency)
    {
        if ($idCurrency === null) {
            $this->throwNullValueException(static::ID_CURRENCY);
        }

        return $this->setIdCurrency($idCurrency);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return integer
     */
    public function getIdCurrencyOrFail()
    {
        if ($this->idCurrency === null) {
            $this->throwNullValueException(static::ID_CURRENCY);
        }

        return $this->idCurrency;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireIdCurrency()
    {
        $this->assertPropertyIsSet(self::ID_CURRENCY);

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
     * @param string|null $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        $this->modifiedProperties[self::CODE] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @module 
     *
     * @param string|null $code
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setCodeOrFail($code)
    {
        if ($code === null) {
            $this->throwNullValueException(static::CODE);
        }

        return $this->setCode($code);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getCodeOrFail()
    {
        if ($this->code === null) {
            $this->throwNullValueException(static::CODE);
        }

        return $this->code;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireCode()
    {
        $this->assertPropertyIsSet(self::CODE);

        return $this;
    }

    /**
     * @module 
     *
     * @param string|null $symbol
     *
     * @return $this
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        $this->modifiedProperties[self::SYMBOL] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @module 
     *
     * @param string|null $symbol
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setSymbolOrFail($symbol)
    {
        if ($symbol === null) {
            $this->throwNullValueException(static::SYMBOL);
        }

        return $this->setSymbol($symbol);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getSymbolOrFail()
    {
        if ($this->symbol === null) {
            $this->throwNullValueException(static::SYMBOL);
        }

        return $this->symbol;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSymbol()
    {
        $this->assertPropertyIsSet(self::SYMBOL);

        return $this;
    }

    /**
     * @module 
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\SpyStoreEntityTransfer[] $spyStores
     *
     * @return $this
     */
    public function setSpyStores(ArrayObject $spyStores)
    {
        $this->spyStores = $spyStores;
        $this->modifiedProperties[self::SPY_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\SpyStoreEntityTransfer[]
     */
    public function getSpyStores()
    {
        return $this->spyStores;
    }

    /**
     * @module 
     *
     * @param \Generated\Shared\Transfer\SpyStoreEntityTransfer $spyStores
     *
     * @return $this
     */
    public function addSpyStores(SpyStoreEntityTransfer $spyStores)
    {
        $this->spyStores[] = $spyStores;
        $this->modifiedProperties[self::SPY_STORES] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireSpyStores()
    {
        $this->assertCollectionPropertyIsSet(self::SPY_STORES);

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
                case 'idCurrency':
                case 'name':
                case 'code':
                case 'symbol':
                    $this->$normalizedPropertyName = $value;
                    $this->modifiedProperties[$normalizedPropertyName] = true;

                    break;
                case 'spyStores':
                case 'spyCurrencyStores':
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
                case 'idCurrency':
                case 'name':
                case 'code':
                case 'symbol':
                    $values[$arrayKey] = $value;

                    break;
                case 'spyStores':
                case 'spyCurrencyStores':
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
                case 'idCurrency':
                case 'name':
                case 'code':
                case 'symbol':
                    $values[$arrayKey] = $value;

                    break;
                case 'spyStores':
                case 'spyCurrencyStores':
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
        $this->spyStores = $this->spyStores ?: new ArrayObject();
        $this->spyCurrencyStores = $this->spyCurrencyStores ?: new ArrayObject();
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveCamelCased(): array
    {
        return [
            'idCurrency' => $this->idCurrency,
            'name' => $this->name,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'spyStores' => $this->spyStores,
            'spyCurrencyStores' => $this->spyCurrencyStores,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'id_currency' => $this->idCurrency,
            'name' => $this->name,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'spy_stores' => $this->spyStores,
            'spy_currency_stores' => $this->spyCurrencyStores,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'id_currency' => $this->idCurrency instanceof AbstractTransfer ? $this->idCurrency->toArray(true, false) : $this->idCurrency,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, false) : $this->name,
            'code' => $this->code instanceof AbstractTransfer ? $this->code->toArray(true, false) : $this->code,
            'symbol' => $this->symbol instanceof AbstractTransfer ? $this->symbol->toArray(true, false) : $this->symbol,
            'spy_stores' => $this->spyStores instanceof AbstractTransfer ? $this->spyStores->toArray(true, false) : $this->addValuesToCollection($this->spyStores, true, false),
            'spy_currency_stores' => $this->spyCurrencyStores instanceof AbstractTransfer ? $this->spyCurrencyStores->toArray(true, false) : $this->addValuesToCollection($this->spyCurrencyStores, true, false),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'idCurrency' => $this->idCurrency instanceof AbstractTransfer ? $this->idCurrency->toArray(true, true) : $this->idCurrency,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, true) : $this->name,
            'code' => $this->code instanceof AbstractTransfer ? $this->code->toArray(true, true) : $this->code,
            'symbol' => $this->symbol instanceof AbstractTransfer ? $this->symbol->toArray(true, true) : $this->symbol,
            'spyStores' => $this->spyStores instanceof AbstractTransfer ? $this->spyStores->toArray(true, true) : $this->addValuesToCollection($this->spyStores, true, true),
            'spyCurrencyStores' => $this->spyCurrencyStores instanceof AbstractTransfer ? $this->spyCurrencyStores->toArray(true, true) : $this->addValuesToCollection($this->spyCurrencyStores, true, true),
        ];
    }
}
