<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractEntityTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class SpyEventBehaviorEntityChangeEntityTransfer extends AbstractEntityTransfer
{
    /**
     * @var string
     */
    public const ID_EVENT_BEHAVIOR_ENTITY_CHANGE = 'idEventBehaviorEntityChange';

    /**
     * @var string
     */
    public const DATA = 'data';

    /**
     * @var string
     */
    public const PROCESS_ID = 'processId';

    /**
     * @var string|null
     */
    protected $idEventBehaviorEntityChange;

    /**
     * @var string|null
     */
    protected $data;

    /**
     * @var string|null
     */
    protected $processId;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'id_event_behavior_entity_change' => 'idEventBehaviorEntityChange',
        'idEventBehaviorEntityChange' => 'idEventBehaviorEntityChange',
        'IdEventBehaviorEntityChange' => 'idEventBehaviorEntityChange',
        'data' => 'data',
        'Data' => 'data',
        'process_id' => 'processId',
        'processId' => 'processId',
        'ProcessId' => 'processId',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::ID_EVENT_BEHAVIOR_ENTITY_CHANGE => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'id_event_behavior_entity_change',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::DATA => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'data',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PROCESS_ID => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'process_id',
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
     * @var string
     */
    public static $entityNamespace = 'Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChange';


    /**
     * @module 
     *
     * @param string|null $idEventBehaviorEntityChange
     *
     * @return $this
     */
    public function setIdEventBehaviorEntityChange($idEventBehaviorEntityChange)
    {
        $this->idEventBehaviorEntityChange = $idEventBehaviorEntityChange;
        $this->modifiedProperties[self::ID_EVENT_BEHAVIOR_ENTITY_CHANGE] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getIdEventBehaviorEntityChange()
    {
        return $this->idEventBehaviorEntityChange;
    }

    /**
     * @module 
     *
     * @param string|null $idEventBehaviorEntityChange
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIdEventBehaviorEntityChangeOrFail($idEventBehaviorEntityChange)
    {
        if ($idEventBehaviorEntityChange === null) {
            $this->throwNullValueException(static::ID_EVENT_BEHAVIOR_ENTITY_CHANGE);
        }

        return $this->setIdEventBehaviorEntityChange($idEventBehaviorEntityChange);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getIdEventBehaviorEntityChangeOrFail()
    {
        if ($this->idEventBehaviorEntityChange === null) {
            $this->throwNullValueException(static::ID_EVENT_BEHAVIOR_ENTITY_CHANGE);
        }

        return $this->idEventBehaviorEntityChange;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireIdEventBehaviorEntityChange()
    {
        $this->assertPropertyIsSet(self::ID_EVENT_BEHAVIOR_ENTITY_CHANGE);

        return $this;
    }

    /**
     * @module 
     *
     * @param string|null $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->modifiedProperties[self::DATA] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @module 
     *
     * @param string|null $data
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setDataOrFail($data)
    {
        if ($data === null) {
            $this->throwNullValueException(static::DATA);
        }

        return $this->setData($data);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getDataOrFail()
    {
        if ($this->data === null) {
            $this->throwNullValueException(static::DATA);
        }

        return $this->data;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireData()
    {
        $this->assertPropertyIsSet(self::DATA);

        return $this;
    }

    /**
     * @module 
     *
     * @param string|null $processId
     *
     * @return $this
     */
    public function setProcessId($processId)
    {
        $this->processId = $processId;
        $this->modifiedProperties[self::PROCESS_ID] = true;

        return $this;
    }

    /**
     * @module 
     *
     * @return string|null
     */
    public function getProcessId()
    {
        return $this->processId;
    }

    /**
     * @module 
     *
     * @param string|null $processId
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setProcessIdOrFail($processId)
    {
        if ($processId === null) {
            $this->throwNullValueException(static::PROCESS_ID);
        }

        return $this->setProcessId($processId);
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getProcessIdOrFail()
    {
        if ($this->processId === null) {
            $this->throwNullValueException(static::PROCESS_ID);
        }

        return $this->processId;
    }

    /**
     * @module 
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireProcessId()
    {
        $this->assertPropertyIsSet(self::PROCESS_ID);

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
                case 'idEventBehaviorEntityChange':
                case 'data':
                case 'processId':
                    $this->$normalizedPropertyName = $value;
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
                case 'idEventBehaviorEntityChange':
                case 'data':
                case 'processId':
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
                case 'idEventBehaviorEntityChange':
                case 'data':
                case 'processId':
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
            'idEventBehaviorEntityChange' => $this->idEventBehaviorEntityChange,
            'data' => $this->data,
            'processId' => $this->processId,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'id_event_behavior_entity_change' => $this->idEventBehaviorEntityChange,
            'data' => $this->data,
            'process_id' => $this->processId,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'id_event_behavior_entity_change' => $this->idEventBehaviorEntityChange instanceof AbstractTransfer ? $this->idEventBehaviorEntityChange->toArray(true, false) : $this->idEventBehaviorEntityChange,
            'data' => $this->data instanceof AbstractTransfer ? $this->data->toArray(true, false) : $this->data,
            'process_id' => $this->processId instanceof AbstractTransfer ? $this->processId->toArray(true, false) : $this->processId,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'idEventBehaviorEntityChange' => $this->idEventBehaviorEntityChange instanceof AbstractTransfer ? $this->idEventBehaviorEntityChange->toArray(true, true) : $this->idEventBehaviorEntityChange,
            'data' => $this->data instanceof AbstractTransfer ? $this->data->toArray(true, true) : $this->data,
            'processId' => $this->processId instanceof AbstractTransfer ? $this->processId->toArray(true, true) : $this->processId,
        ];
    }
}
