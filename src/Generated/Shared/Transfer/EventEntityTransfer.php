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
class EventEntityTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const EVENT = 'event';

    /**
     * @var string
     */
    public const NAME = 'name';

    /**
     * @var string
     */
    public const ID = 'id';

    /**
     * @var string
     */
    public const FOREIGN_KEYS = 'foreignKeys';

    /**
     * @var string
     */
    public const MODIFIED_COLUMNS = 'modifiedColumns';

    /**
     * @var string
     */
    public const ORIGINAL_VALUES = 'originalValues';

    /**
     * @var string
     */
    public const ADDITIONAL_VALUES = 'additionalValues';

    /**
     * @var string|null
     */
    protected $event;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var array
     */
    protected $foreignKeys = [];

    /**
     * @var array
     */
    protected $modifiedColumns = [];

    /**
     * @var array
     */
    protected $originalValues = [];

    /**
     * @var array
     */
    protected $additionalValues = [];

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'event' => 'event',
        'Event' => 'event',
        'name' => 'name',
        'Name' => 'name',
        'id' => 'id',
        'Id' => 'id',
        'foreign_keys' => 'foreignKeys',
        'foreignKeys' => 'foreignKeys',
        'ForeignKeys' => 'foreignKeys',
        'modified_columns' => 'modifiedColumns',
        'modifiedColumns' => 'modifiedColumns',
        'ModifiedColumns' => 'modifiedColumns',
        'original_values' => 'originalValues',
        'originalValues' => 'originalValues',
        'OriginalValues' => 'originalValues',
        'additional_values' => 'additionalValues',
        'additionalValues' => 'additionalValues',
        'AdditionalValues' => 'additionalValues',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::EVENT => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'event',
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
        self::ID => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'id',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::FOREIGN_KEYS => [
            'type' => 'array',
            'type_shim' => null,
            'name_underscore' => 'foreign_keys',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::MODIFIED_COLUMNS => [
            'type' => 'array',
            'type_shim' => null,
            'name_underscore' => 'modified_columns',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::ORIGINAL_VALUES => [
            'type' => 'array',
            'type_shim' => null,
            'name_underscore' => 'original_values',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::ADDITIONAL_VALUES => [
            'type' => 'array',
            'type_shim' => null,
            'name_underscore' => 'additional_values',
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
     * @module EventBehavior
     *
     * @param string|null $event
     *
     * @return $this
     */
    public function setEvent($event)
    {
        $this->event = $event;
        $this->modifiedProperties[self::EVENT] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return string|null
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @module EventBehavior
     *
     * @param string|null $event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setEventOrFail($event)
    {
        if ($event === null) {
            $this->throwNullValueException(static::EVENT);
        }

        return $this->setEvent($event);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getEventOrFail()
    {
        if ($this->event === null) {
            $this->throwNullValueException(static::EVENT);
        }

        return $this->event;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireEvent()
    {
        $this->assertPropertyIsSet(self::EVENT);

        return $this;
    }

    /**
     * @module EventBehavior
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
     * @module EventBehavior
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @module EventBehavior
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
     * @module EventBehavior
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
     * @module EventBehavior
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
     * @module EventBehavior
     *
     * @param int|null $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        $this->modifiedProperties[self::ID] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $id
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIdOrFail($id)
    {
        if ($id === null) {
            $this->throwNullValueException(static::ID);
        }

        return $this->setId($id);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getIdOrFail()
    {
        if ($this->id === null) {
            $this->throwNullValueException(static::ID);
        }

        return $this->id;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireId()
    {
        $this->assertPropertyIsSet(self::ID);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param array|null $foreignKeys
     *
     * @return $this
     */
    public function setForeignKeys(array $foreignKeys = null)
    {
        if ($foreignKeys === null) {
            $foreignKeys = [];
        }

        $this->foreignKeys = $foreignKeys;
        $this->modifiedProperties[self::FOREIGN_KEYS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return array
     */
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * @module EventBehavior
     *
     * @param mixed $foreignKeys
     *
     * @return $this
     */
    public function addForeignKeys($foreignKeys)
    {
        $this->foreignKeys[] = $foreignKeys;
        $this->modifiedProperties[self::FOREIGN_KEYS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireForeignKeys()
    {
        $this->assertPropertyIsSet(self::FOREIGN_KEYS);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param array|null $modifiedColumns
     *
     * @return $this
     */
    public function setModifiedColumns(array $modifiedColumns = null)
    {
        if ($modifiedColumns === null) {
            $modifiedColumns = [];
        }

        $this->modifiedColumns = $modifiedColumns;
        $this->modifiedProperties[self::MODIFIED_COLUMNS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return array
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns;
    }

    /**
     * @module EventBehavior
     *
     * @param mixed $modifiedColumns
     *
     * @return $this
     */
    public function addModifiedColumns($modifiedColumns)
    {
        $this->modifiedColumns[] = $modifiedColumns;
        $this->modifiedProperties[self::MODIFIED_COLUMNS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireModifiedColumns()
    {
        $this->assertPropertyIsSet(self::MODIFIED_COLUMNS);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param array|null $originalValues
     *
     * @return $this
     */
    public function setOriginalValues(array $originalValues = null)
    {
        if ($originalValues === null) {
            $originalValues = [];
        }

        $this->originalValues = $originalValues;
        $this->modifiedProperties[self::ORIGINAL_VALUES] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return array
     */
    public function getOriginalValues()
    {
        return $this->originalValues;
    }

    /**
     * @module EventBehavior
     *
     * @param mixed $originalValues
     *
     * @return $this
     */
    public function addOriginalValues($originalValues)
    {
        $this->originalValues[] = $originalValues;
        $this->modifiedProperties[self::ORIGINAL_VALUES] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireOriginalValues()
    {
        $this->assertPropertyIsSet(self::ORIGINAL_VALUES);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param array|null $additionalValues
     *
     * @return $this
     */
    public function setAdditionalValues(array $additionalValues = null)
    {
        if ($additionalValues === null) {
            $additionalValues = [];
        }

        $this->additionalValues = $additionalValues;
        $this->modifiedProperties[self::ADDITIONAL_VALUES] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return array
     */
    public function getAdditionalValues()
    {
        return $this->additionalValues;
    }

    /**
     * @module EventBehavior
     *
     * @param mixed $additionalValue
     *
     * @return $this
     */
    public function addAdditionalValue($additionalValue)
    {
        $this->additionalValues[] = $additionalValue;
        $this->modifiedProperties[self::ADDITIONAL_VALUES] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireAdditionalValues()
    {
        $this->assertPropertyIsSet(self::ADDITIONAL_VALUES);

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
                case 'event':
                case 'name':
                case 'id':
                case 'foreignKeys':
                case 'modifiedColumns':
                case 'originalValues':
                case 'additionalValues':
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
                case 'event':
                case 'name':
                case 'id':
                case 'foreignKeys':
                case 'modifiedColumns':
                case 'originalValues':
                case 'additionalValues':
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
                case 'event':
                case 'name':
                case 'id':
                case 'foreignKeys':
                case 'modifiedColumns':
                case 'originalValues':
                case 'additionalValues':
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
            'event' => $this->event,
            'name' => $this->name,
            'id' => $this->id,
            'foreignKeys' => $this->foreignKeys,
            'modifiedColumns' => $this->modifiedColumns,
            'originalValues' => $this->originalValues,
            'additionalValues' => $this->additionalValues,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'event' => $this->event,
            'name' => $this->name,
            'id' => $this->id,
            'foreign_keys' => $this->foreignKeys,
            'modified_columns' => $this->modifiedColumns,
            'original_values' => $this->originalValues,
            'additional_values' => $this->additionalValues,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'event' => $this->event instanceof AbstractTransfer ? $this->event->toArray(true, false) : $this->event,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, false) : $this->name,
            'id' => $this->id instanceof AbstractTransfer ? $this->id->toArray(true, false) : $this->id,
            'foreign_keys' => $this->foreignKeys instanceof AbstractTransfer ? $this->foreignKeys->toArray(true, false) : $this->foreignKeys,
            'modified_columns' => $this->modifiedColumns instanceof AbstractTransfer ? $this->modifiedColumns->toArray(true, false) : $this->modifiedColumns,
            'original_values' => $this->originalValues instanceof AbstractTransfer ? $this->originalValues->toArray(true, false) : $this->originalValues,
            'additional_values' => $this->additionalValues instanceof AbstractTransfer ? $this->additionalValues->toArray(true, false) : $this->additionalValues,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'event' => $this->event instanceof AbstractTransfer ? $this->event->toArray(true, true) : $this->event,
            'name' => $this->name instanceof AbstractTransfer ? $this->name->toArray(true, true) : $this->name,
            'id' => $this->id instanceof AbstractTransfer ? $this->id->toArray(true, true) : $this->id,
            'foreignKeys' => $this->foreignKeys instanceof AbstractTransfer ? $this->foreignKeys->toArray(true, true) : $this->foreignKeys,
            'modifiedColumns' => $this->modifiedColumns instanceof AbstractTransfer ? $this->modifiedColumns->toArray(true, true) : $this->modifiedColumns,
            'originalValues' => $this->originalValues instanceof AbstractTransfer ? $this->originalValues->toArray(true, true) : $this->originalValues,
            'additionalValues' => $this->additionalValues instanceof AbstractTransfer ? $this->additionalValues->toArray(true, true) : $this->additionalValues,
        ];
    }
}
