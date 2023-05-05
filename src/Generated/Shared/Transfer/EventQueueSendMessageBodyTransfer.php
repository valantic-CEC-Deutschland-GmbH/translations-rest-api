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
class EventQueueSendMessageBodyTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const TRANSFER_DATA = 'transferData';

    /**
     * @var string
     */
    public const TRANSFER_CLASS_NAME = 'transferClassName';

    /**
     * @var string
     */
    public const LISTENER_CLASS_NAME = 'listenerClassName';

    /**
     * @var string
     */
    public const EVENT_NAME = 'eventName';

    /**
     * @var array
     */
    protected $transferData = [];

    /**
     * @var string|null
     */
    protected $transferClassName;

    /**
     * @var string|null
     */
    protected $listenerClassName;

    /**
     * @var string|null
     */
    protected $eventName;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'transfer_data' => 'transferData',
        'transferData' => 'transferData',
        'TransferData' => 'transferData',
        'transfer_class_name' => 'transferClassName',
        'transferClassName' => 'transferClassName',
        'TransferClassName' => 'transferClassName',
        'listener_class_name' => 'listenerClassName',
        'listenerClassName' => 'listenerClassName',
        'ListenerClassName' => 'listenerClassName',
        'event_name' => 'eventName',
        'eventName' => 'eventName',
        'EventName' => 'eventName',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::TRANSFER_DATA => [
            'type' => 'array',
            'type_shim' => null,
            'name_underscore' => 'transfer_data',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::TRANSFER_CLASS_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'transfer_class_name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::LISTENER_CLASS_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'listener_class_name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::EVENT_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'event_name',
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
     * @module Event
     *
     * @param array|null $transferData
     *
     * @return $this
     */
    public function setTransferData(array $transferData = null)
    {
        if ($transferData === null) {
            $transferData = [];
        }

        $this->transferData = $transferData;
        $this->modifiedProperties[self::TRANSFER_DATA] = true;

        return $this;
    }

    /**
     * @module Event
     *
     * @return array
     */
    public function getTransferData()
    {
        return $this->transferData;
    }

    /**
     * @module Event
     *
     * @param mixed $transferData
     *
     * @return $this
     */
    public function addTransferData($transferData)
    {
        $this->transferData[] = $transferData;
        $this->modifiedProperties[self::TRANSFER_DATA] = true;

        return $this;
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireTransferData()
    {
        $this->assertPropertyIsSet(self::TRANSFER_DATA);

        return $this;
    }

    /**
     * @module Event
     *
     * @param string|null $transferClassName
     *
     * @return $this
     */
    public function setTransferClassName($transferClassName)
    {
        $this->transferClassName = $transferClassName;
        $this->modifiedProperties[self::TRANSFER_CLASS_NAME] = true;

        return $this;
    }

    /**
     * @module Event
     *
     * @return string|null
     */
    public function getTransferClassName()
    {
        return $this->transferClassName;
    }

    /**
     * @module Event
     *
     * @param string|null $transferClassName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setTransferClassNameOrFail($transferClassName)
    {
        if ($transferClassName === null) {
            $this->throwNullValueException(static::TRANSFER_CLASS_NAME);
        }

        return $this->setTransferClassName($transferClassName);
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getTransferClassNameOrFail()
    {
        if ($this->transferClassName === null) {
            $this->throwNullValueException(static::TRANSFER_CLASS_NAME);
        }

        return $this->transferClassName;
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireTransferClassName()
    {
        $this->assertPropertyIsSet(self::TRANSFER_CLASS_NAME);

        return $this;
    }

    /**
     * @module Event
     *
     * @param string|null $listenerClassName
     *
     * @return $this
     */
    public function setListenerClassName($listenerClassName)
    {
        $this->listenerClassName = $listenerClassName;
        $this->modifiedProperties[self::LISTENER_CLASS_NAME] = true;

        return $this;
    }

    /**
     * @module Event
     *
     * @return string|null
     */
    public function getListenerClassName()
    {
        return $this->listenerClassName;
    }

    /**
     * @module Event
     *
     * @param string|null $listenerClassName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setListenerClassNameOrFail($listenerClassName)
    {
        if ($listenerClassName === null) {
            $this->throwNullValueException(static::LISTENER_CLASS_NAME);
        }

        return $this->setListenerClassName($listenerClassName);
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getListenerClassNameOrFail()
    {
        if ($this->listenerClassName === null) {
            $this->throwNullValueException(static::LISTENER_CLASS_NAME);
        }

        return $this->listenerClassName;
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireListenerClassName()
    {
        $this->assertPropertyIsSet(self::LISTENER_CLASS_NAME);

        return $this;
    }

    /**
     * @module Event
     *
     * @param string|null $eventName
     *
     * @return $this
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
        $this->modifiedProperties[self::EVENT_NAME] = true;

        return $this;
    }

    /**
     * @module Event
     *
     * @return string|null
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @module Event
     *
     * @param string|null $eventName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setEventNameOrFail($eventName)
    {
        if ($eventName === null) {
            $this->throwNullValueException(static::EVENT_NAME);
        }

        return $this->setEventName($eventName);
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getEventNameOrFail()
    {
        if ($this->eventName === null) {
            $this->throwNullValueException(static::EVENT_NAME);
        }

        return $this->eventName;
    }

    /**
     * @module Event
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireEventName()
    {
        $this->assertPropertyIsSet(self::EVENT_NAME);

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
                case 'transferData':
                case 'transferClassName':
                case 'listenerClassName':
                case 'eventName':
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
                case 'transferData':
                case 'transferClassName':
                case 'listenerClassName':
                case 'eventName':
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
                case 'transferData':
                case 'transferClassName':
                case 'listenerClassName':
                case 'eventName':
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
            'transferData' => $this->transferData,
            'transferClassName' => $this->transferClassName,
            'listenerClassName' => $this->listenerClassName,
            'eventName' => $this->eventName,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'transfer_data' => $this->transferData,
            'transfer_class_name' => $this->transferClassName,
            'listener_class_name' => $this->listenerClassName,
            'event_name' => $this->eventName,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'transfer_data' => $this->transferData instanceof AbstractTransfer ? $this->transferData->toArray(true, false) : $this->transferData,
            'transfer_class_name' => $this->transferClassName instanceof AbstractTransfer ? $this->transferClassName->toArray(true, false) : $this->transferClassName,
            'listener_class_name' => $this->listenerClassName instanceof AbstractTransfer ? $this->listenerClassName->toArray(true, false) : $this->listenerClassName,
            'event_name' => $this->eventName instanceof AbstractTransfer ? $this->eventName->toArray(true, false) : $this->eventName,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'transferData' => $this->transferData instanceof AbstractTransfer ? $this->transferData->toArray(true, true) : $this->transferData,
            'transferClassName' => $this->transferClassName instanceof AbstractTransfer ? $this->transferClassName->toArray(true, true) : $this->transferClassName,
            'listenerClassName' => $this->listenerClassName instanceof AbstractTransfer ? $this->listenerClassName->toArray(true, true) : $this->listenerClassName,
            'eventName' => $this->eventName instanceof AbstractTransfer ? $this->eventName->toArray(true, true) : $this->eventName,
        ];
    }
}
