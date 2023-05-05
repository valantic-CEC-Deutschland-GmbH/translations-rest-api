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
class EventTriggerResponseTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const IS_SUCCESSFUL = 'isSuccessful';

    /**
     * @var string
     */
    public const IS_EVENT_TRIGGERING_ACTIVE = 'isEventTriggeringActive';

    /**
     * @var string
     */
    public const EVENT_BEHAVIOR_TABLE_EXISTS = 'eventBehaviorTableExists';

    /**
     * @var string
     */
    public const MESSAGE = 'message';

    /**
     * @var string
     */
    public const REQUEST_ID = 'requestId';

    /**
     * @var string
     */
    public const EVENT_COUNT = 'eventCount';

    /**
     * @var string
     */
    public const TRIGGERED_ROWS = 'triggeredRows';

    /**
     * @var string
     */
    public const DELETED_ROWS = 'deletedRows';

    /**
     * @var bool|null
     */
    protected $isSuccessful;

    /**
     * @var bool|null
     */
    protected $isEventTriggeringActive;

    /**
     * @var bool|null
     */
    protected $eventBehaviorTableExists;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var string|null
     */
    protected $requestId;

    /**
     * @var int|null
     */
    protected $eventCount;

    /**
     * @var int|null
     */
    protected $triggeredRows;

    /**
     * @var int|null
     */
    protected $deletedRows;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'is_successful' => 'isSuccessful',
        'isSuccessful' => 'isSuccessful',
        'IsSuccessful' => 'isSuccessful',
        'is_event_triggering_active' => 'isEventTriggeringActive',
        'isEventTriggeringActive' => 'isEventTriggeringActive',
        'IsEventTriggeringActive' => 'isEventTriggeringActive',
        'event_behavior_table_exists' => 'eventBehaviorTableExists',
        'eventBehaviorTableExists' => 'eventBehaviorTableExists',
        'EventBehaviorTableExists' => 'eventBehaviorTableExists',
        'message' => 'message',
        'Message' => 'message',
        'request_id' => 'requestId',
        'requestId' => 'requestId',
        'RequestId' => 'requestId',
        'event_count' => 'eventCount',
        'eventCount' => 'eventCount',
        'EventCount' => 'eventCount',
        'triggered_rows' => 'triggeredRows',
        'triggeredRows' => 'triggeredRows',
        'TriggeredRows' => 'triggeredRows',
        'deleted_rows' => 'deletedRows',
        'deletedRows' => 'deletedRows',
        'DeletedRows' => 'deletedRows',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::IS_SUCCESSFUL => [
            'type' => 'bool',
            'type_shim' => null,
            'name_underscore' => 'is_successful',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::IS_EVENT_TRIGGERING_ACTIVE => [
            'type' => 'bool',
            'type_shim' => null,
            'name_underscore' => 'is_event_triggering_active',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::EVENT_BEHAVIOR_TABLE_EXISTS => [
            'type' => 'bool',
            'type_shim' => null,
            'name_underscore' => 'event_behavior_table_exists',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::MESSAGE => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'message',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::REQUEST_ID => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'request_id',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::EVENT_COUNT => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'event_count',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::TRIGGERED_ROWS => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'triggered_rows',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::DELETED_ROWS => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'deleted_rows',
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
     * @param bool|null $isSuccessful
     *
     * @return $this
     */
    public function setIsSuccessful($isSuccessful)
    {
        $this->isSuccessful = $isSuccessful;
        $this->modifiedProperties[self::IS_SUCCESSFUL] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return bool|null
     */
    public function getIsSuccessful()
    {
        return $this->isSuccessful;
    }

    /**
     * @module EventBehavior
     *
     * @param bool|null $isSuccessful
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIsSuccessfulOrFail($isSuccessful)
    {
        if ($isSuccessful === null) {
            $this->throwNullValueException(static::IS_SUCCESSFUL);
        }

        return $this->setIsSuccessful($isSuccessful);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return bool
     */
    public function getIsSuccessfulOrFail()
    {
        if ($this->isSuccessful === null) {
            $this->throwNullValueException(static::IS_SUCCESSFUL);
        }

        return $this->isSuccessful;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireIsSuccessful()
    {
        $this->assertPropertyIsSet(self::IS_SUCCESSFUL);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param bool|null $isEventTriggeringActive
     *
     * @return $this
     */
    public function setIsEventTriggeringActive($isEventTriggeringActive)
    {
        $this->isEventTriggeringActive = $isEventTriggeringActive;
        $this->modifiedProperties[self::IS_EVENT_TRIGGERING_ACTIVE] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return bool|null
     */
    public function getIsEventTriggeringActive()
    {
        return $this->isEventTriggeringActive;
    }

    /**
     * @module EventBehavior
     *
     * @param bool|null $isEventTriggeringActive
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setIsEventTriggeringActiveOrFail($isEventTriggeringActive)
    {
        if ($isEventTriggeringActive === null) {
            $this->throwNullValueException(static::IS_EVENT_TRIGGERING_ACTIVE);
        }

        return $this->setIsEventTriggeringActive($isEventTriggeringActive);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return bool
     */
    public function getIsEventTriggeringActiveOrFail()
    {
        if ($this->isEventTriggeringActive === null) {
            $this->throwNullValueException(static::IS_EVENT_TRIGGERING_ACTIVE);
        }

        return $this->isEventTriggeringActive;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireIsEventTriggeringActive()
    {
        $this->assertPropertyIsSet(self::IS_EVENT_TRIGGERING_ACTIVE);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param bool|null $eventBehaviorTableExists
     *
     * @return $this
     */
    public function setEventBehaviorTableExists($eventBehaviorTableExists)
    {
        $this->eventBehaviorTableExists = $eventBehaviorTableExists;
        $this->modifiedProperties[self::EVENT_BEHAVIOR_TABLE_EXISTS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return bool|null
     */
    public function getEventBehaviorTableExists()
    {
        return $this->eventBehaviorTableExists;
    }

    /**
     * @module EventBehavior
     *
     * @param bool|null $eventBehaviorTableExists
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setEventBehaviorTableExistsOrFail($eventBehaviorTableExists)
    {
        if ($eventBehaviorTableExists === null) {
            $this->throwNullValueException(static::EVENT_BEHAVIOR_TABLE_EXISTS);
        }

        return $this->setEventBehaviorTableExists($eventBehaviorTableExists);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return bool
     */
    public function getEventBehaviorTableExistsOrFail()
    {
        if ($this->eventBehaviorTableExists === null) {
            $this->throwNullValueException(static::EVENT_BEHAVIOR_TABLE_EXISTS);
        }

        return $this->eventBehaviorTableExists;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireEventBehaviorTableExists()
    {
        $this->assertPropertyIsSet(self::EVENT_BEHAVIOR_TABLE_EXISTS);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param string|null $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        $this->modifiedProperties[self::MESSAGE] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @module EventBehavior
     *
     * @param string|null $message
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setMessageOrFail($message)
    {
        if ($message === null) {
            $this->throwNullValueException(static::MESSAGE);
        }

        return $this->setMessage($message);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getMessageOrFail()
    {
        if ($this->message === null) {
            $this->throwNullValueException(static::MESSAGE);
        }

        return $this->message;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireMessage()
    {
        $this->assertPropertyIsSet(self::MESSAGE);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param string|null $requestId
     *
     * @return $this
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        $this->modifiedProperties[self::REQUEST_ID] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @module EventBehavior
     *
     * @param string|null $requestId
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setRequestIdOrFail($requestId)
    {
        if ($requestId === null) {
            $this->throwNullValueException(static::REQUEST_ID);
        }

        return $this->setRequestId($requestId);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getRequestIdOrFail()
    {
        if ($this->requestId === null) {
            $this->throwNullValueException(static::REQUEST_ID);
        }

        return $this->requestId;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireRequestId()
    {
        $this->assertPropertyIsSet(self::REQUEST_ID);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $eventCount
     *
     * @return $this
     */
    public function setEventCount($eventCount)
    {
        $this->eventCount = $eventCount;
        $this->modifiedProperties[self::EVENT_COUNT] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return int|null
     */
    public function getEventCount()
    {
        return $this->eventCount;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $eventCount
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setEventCountOrFail($eventCount)
    {
        if ($eventCount === null) {
            $this->throwNullValueException(static::EVENT_COUNT);
        }

        return $this->setEventCount($eventCount);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getEventCountOrFail()
    {
        if ($this->eventCount === null) {
            $this->throwNullValueException(static::EVENT_COUNT);
        }

        return $this->eventCount;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireEventCount()
    {
        $this->assertPropertyIsSet(self::EVENT_COUNT);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $triggeredRows
     *
     * @return $this
     */
    public function setTriggeredRows($triggeredRows)
    {
        $this->triggeredRows = $triggeredRows;
        $this->modifiedProperties[self::TRIGGERED_ROWS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return int|null
     */
    public function getTriggeredRows()
    {
        return $this->triggeredRows;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $triggeredRows
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setTriggeredRowsOrFail($triggeredRows)
    {
        if ($triggeredRows === null) {
            $this->throwNullValueException(static::TRIGGERED_ROWS);
        }

        return $this->setTriggeredRows($triggeredRows);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getTriggeredRowsOrFail()
    {
        if ($this->triggeredRows === null) {
            $this->throwNullValueException(static::TRIGGERED_ROWS);
        }

        return $this->triggeredRows;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireTriggeredRows()
    {
        $this->assertPropertyIsSet(self::TRIGGERED_ROWS);

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $deletedRows
     *
     * @return $this
     */
    public function setDeletedRows($deletedRows)
    {
        $this->deletedRows = $deletedRows;
        $this->modifiedProperties[self::DELETED_ROWS] = true;

        return $this;
    }

    /**
     * @module EventBehavior
     *
     * @return int|null
     */
    public function getDeletedRows()
    {
        return $this->deletedRows;
    }

    /**
     * @module EventBehavior
     *
     * @param int|null $deletedRows
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setDeletedRowsOrFail($deletedRows)
    {
        if ($deletedRows === null) {
            $this->throwNullValueException(static::DELETED_ROWS);
        }

        return $this->setDeletedRows($deletedRows);
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getDeletedRowsOrFail()
    {
        if ($this->deletedRows === null) {
            $this->throwNullValueException(static::DELETED_ROWS);
        }

        return $this->deletedRows;
    }

    /**
     * @module EventBehavior
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireDeletedRows()
    {
        $this->assertPropertyIsSet(self::DELETED_ROWS);

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
                case 'isSuccessful':
                case 'isEventTriggeringActive':
                case 'eventBehaviorTableExists':
                case 'message':
                case 'requestId':
                case 'eventCount':
                case 'triggeredRows':
                case 'deletedRows':
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
                case 'isSuccessful':
                case 'isEventTriggeringActive':
                case 'eventBehaviorTableExists':
                case 'message':
                case 'requestId':
                case 'eventCount':
                case 'triggeredRows':
                case 'deletedRows':
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
                case 'isSuccessful':
                case 'isEventTriggeringActive':
                case 'eventBehaviorTableExists':
                case 'message':
                case 'requestId':
                case 'eventCount':
                case 'triggeredRows':
                case 'deletedRows':
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
            'isSuccessful' => $this->isSuccessful,
            'isEventTriggeringActive' => $this->isEventTriggeringActive,
            'eventBehaviorTableExists' => $this->eventBehaviorTableExists,
            'message' => $this->message,
            'requestId' => $this->requestId,
            'eventCount' => $this->eventCount,
            'triggeredRows' => $this->triggeredRows,
            'deletedRows' => $this->deletedRows,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'is_successful' => $this->isSuccessful,
            'is_event_triggering_active' => $this->isEventTriggeringActive,
            'event_behavior_table_exists' => $this->eventBehaviorTableExists,
            'message' => $this->message,
            'request_id' => $this->requestId,
            'event_count' => $this->eventCount,
            'triggered_rows' => $this->triggeredRows,
            'deleted_rows' => $this->deletedRows,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'is_successful' => $this->isSuccessful instanceof AbstractTransfer ? $this->isSuccessful->toArray(true, false) : $this->isSuccessful,
            'is_event_triggering_active' => $this->isEventTriggeringActive instanceof AbstractTransfer ? $this->isEventTriggeringActive->toArray(true, false) : $this->isEventTriggeringActive,
            'event_behavior_table_exists' => $this->eventBehaviorTableExists instanceof AbstractTransfer ? $this->eventBehaviorTableExists->toArray(true, false) : $this->eventBehaviorTableExists,
            'message' => $this->message instanceof AbstractTransfer ? $this->message->toArray(true, false) : $this->message,
            'request_id' => $this->requestId instanceof AbstractTransfer ? $this->requestId->toArray(true, false) : $this->requestId,
            'event_count' => $this->eventCount instanceof AbstractTransfer ? $this->eventCount->toArray(true, false) : $this->eventCount,
            'triggered_rows' => $this->triggeredRows instanceof AbstractTransfer ? $this->triggeredRows->toArray(true, false) : $this->triggeredRows,
            'deleted_rows' => $this->deletedRows instanceof AbstractTransfer ? $this->deletedRows->toArray(true, false) : $this->deletedRows,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'isSuccessful' => $this->isSuccessful instanceof AbstractTransfer ? $this->isSuccessful->toArray(true, true) : $this->isSuccessful,
            'isEventTriggeringActive' => $this->isEventTriggeringActive instanceof AbstractTransfer ? $this->isEventTriggeringActive->toArray(true, true) : $this->isEventTriggeringActive,
            'eventBehaviorTableExists' => $this->eventBehaviorTableExists instanceof AbstractTransfer ? $this->eventBehaviorTableExists->toArray(true, true) : $this->eventBehaviorTableExists,
            'message' => $this->message instanceof AbstractTransfer ? $this->message->toArray(true, true) : $this->message,
            'requestId' => $this->requestId instanceof AbstractTransfer ? $this->requestId->toArray(true, true) : $this->requestId,
            'eventCount' => $this->eventCount instanceof AbstractTransfer ? $this->eventCount->toArray(true, true) : $this->eventCount,
            'triggeredRows' => $this->triggeredRows instanceof AbstractTransfer ? $this->triggeredRows->toArray(true, true) : $this->triggeredRows,
            'deletedRows' => $this->deletedRows instanceof AbstractTransfer ? $this->deletedRows->toArray(true, true) : $this->deletedRows,
        ];
    }
}
