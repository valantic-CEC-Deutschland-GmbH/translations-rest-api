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
class PackageTransfer extends AbstractTransfer
{
    /**
     * @var string
     */
    public const COMPOSER_NAME = 'composerName';

    /**
     * @var string
     */
    public const ORGANIZATION_NAME = 'organizationName';

    /**
     * @var string
     */
    public const ORGANIZATION_NAME_DASHED = 'organizationNameDashed';

    /**
     * @var string
     */
    public const PACKAGE_NAME = 'packageName';

    /**
     * @var string
     */
    public const PACKAGE_NAME_DASHED = 'packageNameDashed';

    /**
     * @var string
     */
    public const PATH = 'path';

    /**
     * @var string|null
     */
    protected $composerName;

    /**
     * @var string|null
     */
    protected $organizationName;

    /**
     * @var string|null
     */
    protected $organizationNameDashed;

    /**
     * @var string|null
     */
    protected $packageName;

    /**
     * @var string|null
     */
    protected $packageNameDashed;

    /**
     * @var string|null
     */
    protected $path;

    /**
     * @var array<string, string>
     */
    protected $transferPropertyNameMap = [
        'composer_name' => 'composerName',
        'composerName' => 'composerName',
        'ComposerName' => 'composerName',
        'organization_name' => 'organizationName',
        'organizationName' => 'organizationName',
        'OrganizationName' => 'organizationName',
        'organization_name_dashed' => 'organizationNameDashed',
        'organizationNameDashed' => 'organizationNameDashed',
        'OrganizationNameDashed' => 'organizationNameDashed',
        'package_name' => 'packageName',
        'packageName' => 'packageName',
        'PackageName' => 'packageName',
        'package_name_dashed' => 'packageNameDashed',
        'packageNameDashed' => 'packageNameDashed',
        'PackageNameDashed' => 'packageNameDashed',
        'path' => 'path',
        'Path' => 'path',
    ];

    /**
     * @var array<string, array<string, mixed>>
     */
    protected $transferMetadata = [
        self::COMPOSER_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'composer_name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::ORGANIZATION_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'organization_name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::ORGANIZATION_NAME_DASHED => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'organization_name_dashed',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PACKAGE_NAME => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'package_name',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PACKAGE_NAME_DASHED => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'package_name_dashed',
            'is_collection' => false,
            'is_transfer' => false,
            'is_value_object' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
            'is_strict' => false,
        ],
        self::PATH => [
            'type' => 'string',
            'type_shim' => null,
            'name_underscore' => 'path',
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
     * @module Development|ModuleFinder
     *
     * @param string|null $composerName
     *
     * @return $this
     */
    public function setComposerName($composerName)
    {
        $this->composerName = $composerName;
        $this->modifiedProperties[self::COMPOSER_NAME] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getComposerName()
    {
        return $this->composerName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $composerName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setComposerNameOrFail($composerName)
    {
        if ($composerName === null) {
            $this->throwNullValueException(static::COMPOSER_NAME);
        }

        return $this->setComposerName($composerName);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getComposerNameOrFail()
    {
        if ($this->composerName === null) {
            $this->throwNullValueException(static::COMPOSER_NAME);
        }

        return $this->composerName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireComposerName()
    {
        $this->assertPropertyIsSet(self::COMPOSER_NAME);

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $organizationName
     *
     * @return $this
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;
        $this->modifiedProperties[self::ORGANIZATION_NAME] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $organizationName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setOrganizationNameOrFail($organizationName)
    {
        if ($organizationName === null) {
            $this->throwNullValueException(static::ORGANIZATION_NAME);
        }

        return $this->setOrganizationName($organizationName);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getOrganizationNameOrFail()
    {
        if ($this->organizationName === null) {
            $this->throwNullValueException(static::ORGANIZATION_NAME);
        }

        return $this->organizationName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireOrganizationName()
    {
        $this->assertPropertyIsSet(self::ORGANIZATION_NAME);

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $organizationNameDashed
     *
     * @return $this
     */
    public function setOrganizationNameDashed($organizationNameDashed)
    {
        $this->organizationNameDashed = $organizationNameDashed;
        $this->modifiedProperties[self::ORGANIZATION_NAME_DASHED] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getOrganizationNameDashed()
    {
        return $this->organizationNameDashed;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $organizationNameDashed
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setOrganizationNameDashedOrFail($organizationNameDashed)
    {
        if ($organizationNameDashed === null) {
            $this->throwNullValueException(static::ORGANIZATION_NAME_DASHED);
        }

        return $this->setOrganizationNameDashed($organizationNameDashed);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getOrganizationNameDashedOrFail()
    {
        if ($this->organizationNameDashed === null) {
            $this->throwNullValueException(static::ORGANIZATION_NAME_DASHED);
        }

        return $this->organizationNameDashed;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requireOrganizationNameDashed()
    {
        $this->assertPropertyIsSet(self::ORGANIZATION_NAME_DASHED);

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $packageName
     *
     * @return $this
     */
    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;
        $this->modifiedProperties[self::PACKAGE_NAME] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getPackageName()
    {
        return $this->packageName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $packageName
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPackageNameOrFail($packageName)
    {
        if ($packageName === null) {
            $this->throwNullValueException(static::PACKAGE_NAME);
        }

        return $this->setPackageName($packageName);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getPackageNameOrFail()
    {
        if ($this->packageName === null) {
            $this->throwNullValueException(static::PACKAGE_NAME);
        }

        return $this->packageName;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePackageName()
    {
        $this->assertPropertyIsSet(self::PACKAGE_NAME);

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $packageNameDashed
     *
     * @return $this
     */
    public function setPackageNameDashed($packageNameDashed)
    {
        $this->packageNameDashed = $packageNameDashed;
        $this->modifiedProperties[self::PACKAGE_NAME_DASHED] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getPackageNameDashed()
    {
        return $this->packageNameDashed;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $packageNameDashed
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPackageNameDashedOrFail($packageNameDashed)
    {
        if ($packageNameDashed === null) {
            $this->throwNullValueException(static::PACKAGE_NAME_DASHED);
        }

        return $this->setPackageNameDashed($packageNameDashed);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getPackageNameDashedOrFail()
    {
        if ($this->packageNameDashed === null) {
            $this->throwNullValueException(static::PACKAGE_NAME_DASHED);
        }

        return $this->packageNameDashed;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePackageNameDashed()
    {
        $this->assertPropertyIsSet(self::PACKAGE_NAME_DASHED);

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        $this->modifiedProperties[self::PATH] = true;

        return $this;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @return string|null
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @param string|null $path
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return $this
     */
    public function setPathOrFail($path)
    {
        if ($path === null) {
            $this->throwNullValueException(static::PATH);
        }

        return $this->setPath($path);
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     *
     * @return string
     */
    public function getPathOrFail()
    {
        if ($this->path === null) {
            $this->throwNullValueException(static::PATH);
        }

        return $this->path;
    }

    /**
     * @module Development|ModuleFinder
     *
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException
     *
     * @return $this
     */
    public function requirePath()
    {
        $this->assertPropertyIsSet(self::PATH);

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
                case 'composerName':
                case 'organizationName':
                case 'organizationNameDashed':
                case 'packageName':
                case 'packageNameDashed':
                case 'path':
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
                case 'composerName':
                case 'organizationName':
                case 'organizationNameDashed':
                case 'packageName':
                case 'packageNameDashed':
                case 'path':
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
                case 'composerName':
                case 'organizationName':
                case 'organizationNameDashed':
                case 'packageName':
                case 'packageNameDashed':
                case 'path':
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
            'composerName' => $this->composerName,
            'organizationName' => $this->organizationName,
            'organizationNameDashed' => $this->organizationNameDashed,
            'packageName' => $this->packageName,
            'packageNameDashed' => $this->packageNameDashed,
            'path' => $this->path,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayNotRecursiveNotCamelCased(): array
    {
        return [
            'composer_name' => $this->composerName,
            'organization_name' => $this->organizationName,
            'organization_name_dashed' => $this->organizationNameDashed,
            'package_name' => $this->packageName,
            'package_name_dashed' => $this->packageNameDashed,
            'path' => $this->path,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveNotCamelCased(): array
    {
        return [
            'composer_name' => $this->composerName instanceof AbstractTransfer ? $this->composerName->toArray(true, false) : $this->composerName,
            'organization_name' => $this->organizationName instanceof AbstractTransfer ? $this->organizationName->toArray(true, false) : $this->organizationName,
            'organization_name_dashed' => $this->organizationNameDashed instanceof AbstractTransfer ? $this->organizationNameDashed->toArray(true, false) : $this->organizationNameDashed,
            'package_name' => $this->packageName instanceof AbstractTransfer ? $this->packageName->toArray(true, false) : $this->packageName,
            'package_name_dashed' => $this->packageNameDashed instanceof AbstractTransfer ? $this->packageNameDashed->toArray(true, false) : $this->packageNameDashed,
            'path' => $this->path instanceof AbstractTransfer ? $this->path->toArray(true, false) : $this->path,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArrayRecursiveCamelCased(): array
    {
        return [
            'composerName' => $this->composerName instanceof AbstractTransfer ? $this->composerName->toArray(true, true) : $this->composerName,
            'organizationName' => $this->organizationName instanceof AbstractTransfer ? $this->organizationName->toArray(true, true) : $this->organizationName,
            'organizationNameDashed' => $this->organizationNameDashed instanceof AbstractTransfer ? $this->organizationNameDashed->toArray(true, true) : $this->organizationNameDashed,
            'packageName' => $this->packageName instanceof AbstractTransfer ? $this->packageName->toArray(true, true) : $this->packageName,
            'packageNameDashed' => $this->packageNameDashed instanceof AbstractTransfer ? $this->packageNameDashed->toArray(true, true) : $this->packageNameDashed,
            'path' => $this->path instanceof AbstractTransfer ? $this->path->toArray(true, true) : $this->path,
        ];
    }
}
