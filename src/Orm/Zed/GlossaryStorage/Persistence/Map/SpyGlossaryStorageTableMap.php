<?php

namespace Orm\Zed\GlossaryStorage\Persistence\Map;

use Orm\Zed\GlossaryStorage\Persistence\SpyGlossaryStorage;
use Orm\Zed\GlossaryStorage\Persistence\SpyGlossaryStorageQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'spy_glossary_storage' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SpyGlossaryStorageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Orm.Zed.GlossaryStorage.Persistence.Map.SpyGlossaryStorageTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'spy_glossary_storage';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'SpyGlossaryStorage';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Orm\\Zed\\GlossaryStorage\\Persistence\\SpyGlossaryStorage';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Orm.Zed.GlossaryStorage.Persistence.SpyGlossaryStorage';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id_glossary_storage field
     */
    public const COL_ID_GLOSSARY_STORAGE = 'spy_glossary_storage.id_glossary_storage';

    /**
     * the column name for the fk_glossary_key field
     */
    public const COL_FK_GLOSSARY_KEY = 'spy_glossary_storage.fk_glossary_key';

    /**
     * the column name for the glossary_key field
     */
    public const COL_GLOSSARY_KEY = 'spy_glossary_storage.glossary_key';

    /**
     * the column name for the locale field
     */
    public const COL_LOCALE = 'spy_glossary_storage.locale';

    /**
     * the column name for the data field
     */
    public const COL_DATA = 'spy_glossary_storage.data';

    /**
     * the column name for the key field
     */
    public const COL_KEY = 'spy_glossary_storage.key';

    /**
     * the column name for the alias_keys field
     */
    public const COL_ALIAS_KEYS = 'spy_glossary_storage.alias_keys';

    /**
     * the column name for the created_at field
     */
    public const COL_CREATED_AT = 'spy_glossary_storage.created_at';

    /**
     * the column name for the updated_at field
     */
    public const COL_UPDATED_AT = 'spy_glossary_storage.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['IdGlossaryStorage', 'FkGlossaryKey', 'GlossaryKey', 'Locale', 'Data', 'Key', 'AliasKeys', 'CreatedAt', 'UpdatedAt', ],
        self::TYPE_CAMELNAME     => ['idGlossaryStorage', 'fkGlossaryKey', 'glossaryKey', 'locale', 'data', 'key', 'aliasKeys', 'createdAt', 'updatedAt', ],
        self::TYPE_COLNAME       => [SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE, SpyGlossaryStorageTableMap::COL_FK_GLOSSARY_KEY, SpyGlossaryStorageTableMap::COL_GLOSSARY_KEY, SpyGlossaryStorageTableMap::COL_LOCALE, SpyGlossaryStorageTableMap::COL_DATA, SpyGlossaryStorageTableMap::COL_KEY, SpyGlossaryStorageTableMap::COL_ALIAS_KEYS, SpyGlossaryStorageTableMap::COL_CREATED_AT, SpyGlossaryStorageTableMap::COL_UPDATED_AT, ],
        self::TYPE_FIELDNAME     => ['id_glossary_storage', 'fk_glossary_key', 'glossary_key', 'locale', 'data', 'key', 'alias_keys', 'created_at', 'updated_at', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['IdGlossaryStorage' => 0, 'FkGlossaryKey' => 1, 'GlossaryKey' => 2, 'Locale' => 3, 'Data' => 4, 'Key' => 5, 'AliasKeys' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ],
        self::TYPE_CAMELNAME     => ['idGlossaryStorage' => 0, 'fkGlossaryKey' => 1, 'glossaryKey' => 2, 'locale' => 3, 'data' => 4, 'key' => 5, 'aliasKeys' => 6, 'createdAt' => 7, 'updatedAt' => 8, ],
        self::TYPE_COLNAME       => [SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE => 0, SpyGlossaryStorageTableMap::COL_FK_GLOSSARY_KEY => 1, SpyGlossaryStorageTableMap::COL_GLOSSARY_KEY => 2, SpyGlossaryStorageTableMap::COL_LOCALE => 3, SpyGlossaryStorageTableMap::COL_DATA => 4, SpyGlossaryStorageTableMap::COL_KEY => 5, SpyGlossaryStorageTableMap::COL_ALIAS_KEYS => 6, SpyGlossaryStorageTableMap::COL_CREATED_AT => 7, SpyGlossaryStorageTableMap::COL_UPDATED_AT => 8, ],
        self::TYPE_FIELDNAME     => ['id_glossary_storage' => 0, 'fk_glossary_key' => 1, 'glossary_key' => 2, 'locale' => 3, 'data' => 4, 'key' => 5, 'alias_keys' => 6, 'created_at' => 7, 'updated_at' => 8, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'IdGlossaryStorage' => 'ID_GLOSSARY_STORAGE',
        'SpyGlossaryStorage.IdGlossaryStorage' => 'ID_GLOSSARY_STORAGE',
        'idGlossaryStorage' => 'ID_GLOSSARY_STORAGE',
        'spyGlossaryStorage.idGlossaryStorage' => 'ID_GLOSSARY_STORAGE',
        'SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE' => 'ID_GLOSSARY_STORAGE',
        'COL_ID_GLOSSARY_STORAGE' => 'ID_GLOSSARY_STORAGE',
        'id_glossary_storage' => 'ID_GLOSSARY_STORAGE',
        'spy_glossary_storage.id_glossary_storage' => 'ID_GLOSSARY_STORAGE',
        'FkGlossaryKey' => 'FK_GLOSSARY_KEY',
        'SpyGlossaryStorage.FkGlossaryKey' => 'FK_GLOSSARY_KEY',
        'fkGlossaryKey' => 'FK_GLOSSARY_KEY',
        'spyGlossaryStorage.fkGlossaryKey' => 'FK_GLOSSARY_KEY',
        'SpyGlossaryStorageTableMap::COL_FK_GLOSSARY_KEY' => 'FK_GLOSSARY_KEY',
        'COL_FK_GLOSSARY_KEY' => 'FK_GLOSSARY_KEY',
        'fk_glossary_key' => 'FK_GLOSSARY_KEY',
        'spy_glossary_storage.fk_glossary_key' => 'FK_GLOSSARY_KEY',
        'GlossaryKey' => 'GLOSSARY_KEY',
        'SpyGlossaryStorage.GlossaryKey' => 'GLOSSARY_KEY',
        'glossaryKey' => 'GLOSSARY_KEY',
        'spyGlossaryStorage.glossaryKey' => 'GLOSSARY_KEY',
        'SpyGlossaryStorageTableMap::COL_GLOSSARY_KEY' => 'GLOSSARY_KEY',
        'COL_GLOSSARY_KEY' => 'GLOSSARY_KEY',
        'glossary_key' => 'GLOSSARY_KEY',
        'spy_glossary_storage.glossary_key' => 'GLOSSARY_KEY',
        'Locale' => 'LOCALE',
        'SpyGlossaryStorage.Locale' => 'LOCALE',
        'locale' => 'LOCALE',
        'spyGlossaryStorage.locale' => 'LOCALE',
        'SpyGlossaryStorageTableMap::COL_LOCALE' => 'LOCALE',
        'COL_LOCALE' => 'LOCALE',
        'spy_glossary_storage.locale' => 'LOCALE',
        'Data' => 'DATA',
        'SpyGlossaryStorage.Data' => 'DATA',
        'data' => 'DATA',
        'spyGlossaryStorage.data' => 'DATA',
        'SpyGlossaryStorageTableMap::COL_DATA' => 'DATA',
        'COL_DATA' => 'DATA',
        'spy_glossary_storage.data' => 'DATA',
        'Key' => 'KEY',
        'SpyGlossaryStorage.Key' => 'KEY',
        'key' => 'KEY',
        'spyGlossaryStorage.key' => 'KEY',
        'SpyGlossaryStorageTableMap::COL_KEY' => 'KEY',
        'COL_KEY' => 'KEY',
        'spy_glossary_storage.key' => 'KEY',
        'AliasKeys' => 'ALIAS_KEYS',
        'SpyGlossaryStorage.AliasKeys' => 'ALIAS_KEYS',
        'aliasKeys' => 'ALIAS_KEYS',
        'spyGlossaryStorage.aliasKeys' => 'ALIAS_KEYS',
        'SpyGlossaryStorageTableMap::COL_ALIAS_KEYS' => 'ALIAS_KEYS',
        'COL_ALIAS_KEYS' => 'ALIAS_KEYS',
        'alias_keys' => 'ALIAS_KEYS',
        'spy_glossary_storage.alias_keys' => 'ALIAS_KEYS',
        'CreatedAt' => 'CREATED_AT',
        'SpyGlossaryStorage.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'spyGlossaryStorage.createdAt' => 'CREATED_AT',
        'SpyGlossaryStorageTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'spy_glossary_storage.created_at' => 'CREATED_AT',
        'UpdatedAt' => 'UPDATED_AT',
        'SpyGlossaryStorage.UpdatedAt' => 'UPDATED_AT',
        'updatedAt' => 'UPDATED_AT',
        'spyGlossaryStorage.updatedAt' => 'UPDATED_AT',
        'SpyGlossaryStorageTableMap::COL_UPDATED_AT' => 'UPDATED_AT',
        'COL_UPDATED_AT' => 'UPDATED_AT',
        'updated_at' => 'UPDATED_AT',
        'spy_glossary_storage.updated_at' => 'UPDATED_AT',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('spy_glossary_storage');
        $this->setPhpName('SpyGlossaryStorage');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Orm\\Zed\\GlossaryStorage\\Persistence\\SpyGlossaryStorage');
        $this->setPackage('Orm.Zed.GlossaryStorage.Persistence');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_glossary_storage_pk_seq');
        // columns
        $this->addPrimaryKey('id_glossary_storage', 'IdGlossaryStorage', 'BIGINT', true, null, null);
        $this->addColumn('fk_glossary_key', 'FkGlossaryKey', 'INTEGER', true, null, null);
        $this->addColumn('glossary_key', 'GlossaryKey', 'VARCHAR', true, 255, null);
        $this->addColumn('locale', 'Locale', 'VARCHAR', true, 5, null);
        $this->addColumn('data', 'Data', 'LONGVARCHAR', false, null, null);
        $this->addColumn('key', 'Key', 'VARCHAR', true, 1024, null);
        $this->addColumn('alias_keys', 'AliasKeys', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array<string, array> Associative array (name => parameters) of behaviors
     */
    public function getBehaviors(): array
    {
        return [
            'synchronization' => ['resource' => ['value' => 'translation'], 'queue_group' => ['value' => 'sync.storage.translation'], 'queue_pool' => NULL, 'locale' => ['required' => 'true'], 'key_suffix_column' => ['value' => 'glossary_key']],
            'timestampable' => ['create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false'],
        ];
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdGlossaryStorage', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? SpyGlossaryStorageTableMap::CLASS_DEFAULT : SpyGlossaryStorageTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (SpyGlossaryStorage object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SpyGlossaryStorageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyGlossaryStorageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyGlossaryStorageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyGlossaryStorageTableMap::OM_CLASS;
            /** @var SpyGlossaryStorage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyGlossaryStorageTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SpyGlossaryStorageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyGlossaryStorageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyGlossaryStorage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyGlossaryStorageTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_FK_GLOSSARY_KEY);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_GLOSSARY_KEY);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_LOCALE);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_DATA);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_KEY);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_ALIAS_KEYS);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyGlossaryStorageTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_glossary_storage');
            $criteria->addSelectColumn($alias . '.fk_glossary_key');
            $criteria->addSelectColumn($alias . '.glossary_key');
            $criteria->addSelectColumn($alias . '.locale');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.key');
            $criteria->addSelectColumn($alias . '.alias_keys');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_FK_GLOSSARY_KEY);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_GLOSSARY_KEY);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_LOCALE);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_DATA);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_KEY);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_ALIAS_KEYS);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_CREATED_AT);
            $criteria->removeSelectColumn(SpyGlossaryStorageTableMap::COL_UPDATED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.id_glossary_storage');
            $criteria->removeSelectColumn($alias . '.fk_glossary_key');
            $criteria->removeSelectColumn($alias . '.glossary_key');
            $criteria->removeSelectColumn($alias . '.locale');
            $criteria->removeSelectColumn($alias . '.data');
            $criteria->removeSelectColumn($alias . '.key');
            $criteria->removeSelectColumn($alias . '.alias_keys');
            $criteria->removeSelectColumn($alias . '.created_at');
            $criteria->removeSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(SpyGlossaryStorageTableMap::DATABASE_NAME)->getTable(SpyGlossaryStorageTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a SpyGlossaryStorage or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or SpyGlossaryStorage object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyGlossaryStorageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Orm\Zed\GlossaryStorage\Persistence\SpyGlossaryStorage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyGlossaryStorageTableMap::DATABASE_NAME);
            $criteria->add(SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE, (array) $values, Criteria::IN);
        }

        $query = SpyGlossaryStorageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyGlossaryStorageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyGlossaryStorageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_glossary_storage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SpyGlossaryStorageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyGlossaryStorage or Criteria object.
     *
     * @param mixed $criteria Criteria or SpyGlossaryStorage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyGlossaryStorageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyGlossaryStorage object
        }

        if ($criteria->containsKey(SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE) && $criteria->keyContainsValue(SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyGlossaryStorageTableMap::COL_ID_GLOSSARY_STORAGE.')');
        }


        // Set the correct dbName
        $query = SpyGlossaryStorageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
