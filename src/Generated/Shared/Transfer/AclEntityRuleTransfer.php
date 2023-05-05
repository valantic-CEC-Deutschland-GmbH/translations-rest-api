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
class AclEntityRuleTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const ENTITY = 'entity';

    /**
     * @var string
     */
    public const SCOPE = 'scope';

    /**
     * @var string
     */
    public const PERMISSION_MASK = 'permissionMask';

    /**
     * @var string|null
     */
    protected $entity;

    /**
     * @var string|null
     */
    protected $scope;

    /**
     * @var int|null
     */
    protected $permissionMask;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'entity' => 'entity',
        'Entity' => 'entity',
        'scope' => 'scope',
        'Scope' => 'scope',
        'permission_mask' => 'permissionMask',
        'permissionMask' => 'permissionMask',
        'PermissionMask' => 'permissionMask',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::ENTITY => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'entity',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::SCOPE => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'scope',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PERMISSION_MASK => [
            'type' => 'int',
            'type_shim' => null,
            'name_underscore' => 'permission_mask',
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
     * @module Currency|Locale|Store
     *
     * @param string|null $entity
     *
     * @return $this
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        $this->modifiedProperties[self::ENTITY] = true;

        return $this;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @return string|null
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @param string|null $entity
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setEntityOrFail($entity)
    {
        if ($entity === null) {
            $this->throwNullValueException(static::ENTITY);
        }

        return $this->setEntity($entity);
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getEntityOrFail()
    {
        if ($this->entity === null) {
            $this->throwNullValueException(static::ENTITY);
        }

        return $this->entity;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireEntity()
    {
        $this->assertPropertyIsSet(self::ENTITY);

        return $this;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @param string|null $scope
     *
     * @return $this
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        $this->modifiedProperties[self::SCOPE] = true;

        return $this;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @return string|null
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @param string|null $scope
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setScopeOrFail($scope)
    {
        if ($scope === null) {
            $this->throwNullValueException(static::SCOPE);
        }

        return $this->setScope($scope);
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getScopeOrFail()
    {
        if ($this->scope === null) {
            $this->throwNullValueException(static::SCOPE);
        }

        return $this->scope;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireScope()
    {
        $this->assertPropertyIsSet(self::SCOPE);

        return $this;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @param int|null $permissionMask
     *
     * @return $this
     */
    public function setPermissionMask($permissionMask)
    {
        $this->permissionMask = $permissionMask;
        $this->modifiedProperties[self::PERMISSION_MASK] = true;

        return $this;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @return int|null
     */
    public function getPermissionMask()
    {
        return $this->permissionMask;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @param int|null $permissionMask
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPermissionMaskOrFail($permissionMask)
    {
        if ($permissionMask === null) {
            $this->throwNullValueException(static::PERMISSION_MASK);
        }

        return $this->setPermissionMask($permissionMask);
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return int
     */
    public function getPermissionMaskOrFail()
    {
        if ($this->permissionMask === null) {
            $this->throwNullValueException(static::PERMISSION_MASK);
        }

        return $this->permissionMask;
    }

    /**
     * @module Currency|Locale|Store
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePermissionMask()
    {
        $this->assertPropertyIsSet(self::PERMISSION_MASK);

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
                case 'entity':
                case 'scope':
                case 'permissionMask':
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
                case 'entity':
                case 'scope':
                case 'permissionMask':
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
                case 'entity':
                case 'scope':
                case 'permissionMask':
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
            'entity' => $this->entity,
            'scope' => $this->scope,
            'permissionMask' => $this->permissionMask,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'entity' => $this->entity,
            'scope' => $this->scope,
            'permission_mask' => $this->permissionMask,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'entity' => $this->entity instanceof AbstractTransfer ? $this->entity->toArray(true, false) : $this->entity,
            'scope' => $this->scope instanceof AbstractTransfer ? $this->scope->toArray(true, false) : $this->scope,
            'permission_mask' => $this->permissionMask instanceof AbstractTransfer ? $this->permissionMask->toArray(true, false) : $this->permissionMask,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'entity' => $this->entity instanceof AbstractTransfer ? $this->entity->toArray(true, true) : $this->entity,
            'scope' => $this->scope instanceof AbstractTransfer ? $this->scope->toArray(true, true) : $this->scope,
            'permissionMask' => $this->permissionMask instanceof AbstractTransfer ? $this->permissionMask->toArray(true, true) : $this->permissionMask,
        ];
    }
}
