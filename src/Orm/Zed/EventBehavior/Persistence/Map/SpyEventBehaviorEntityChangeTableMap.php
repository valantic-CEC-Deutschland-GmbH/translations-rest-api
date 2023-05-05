<?php

namespace Orm\Zed\EventBehavior\Persistence\Map;

use Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChange;
use Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChangeQuery;
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
 * This class defines the structure of the 'spy_event_behavior_entity_change' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SpyEventBehaviorEntityChangeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Orm.Zed.EventBehavior.Persistence.Map.SpyEventBehaviorEntityChangeTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'spy_event_behavior_entity_change';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'SpyEventBehaviorEntityChange';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Orm\\Zed\\EventBehavior\\Persistence\\SpyEventBehaviorEntityChange';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Orm.Zed.EventBehavior.Persistence.SpyEventBehaviorEntityChange';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id_event_behavior_entity_change field
     */
    public const COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE = 'spy_event_behavior_entity_change.id_event_behavior_entity_change';

    /**
     * the column name for the data field
     */
    public const COL_DATA = 'spy_event_behavior_entity_change.data';

    /**
     * the column name for the process_id field
     */
    public const COL_PROCESS_ID = 'spy_event_behavior_entity_change.process_id';

    /**
     * the column name for the created_at field
     */
    public const COL_CREATED_AT = 'spy_event_behavior_entity_change.created_at';

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
        self::TYPE_PHPNAME       => ['IdEventBehaviorEntityChange', 'Data', 'ProcessId', 'CreatedAt', ],
        self::TYPE_CAMELNAME     => ['idEventBehaviorEntityChange', 'data', 'processId', 'createdAt', ],
        self::TYPE_COLNAME       => [SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, SpyEventBehaviorEntityChangeTableMap::COL_DATA, SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID, SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT, ],
        self::TYPE_FIELDNAME     => ['id_event_behavior_entity_change', 'data', 'process_id', 'created_at', ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
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
        self::TYPE_PHPNAME       => ['IdEventBehaviorEntityChange' => 0, 'Data' => 1, 'ProcessId' => 2, 'CreatedAt' => 3, ],
        self::TYPE_CAMELNAME     => ['idEventBehaviorEntityChange' => 0, 'data' => 1, 'processId' => 2, 'createdAt' => 3, ],
        self::TYPE_COLNAME       => [SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE => 0, SpyEventBehaviorEntityChangeTableMap::COL_DATA => 1, SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID => 2, SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT => 3, ],
        self::TYPE_FIELDNAME     => ['id_event_behavior_entity_change' => 0, 'data' => 1, 'process_id' => 2, 'created_at' => 3, ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'IdEventBehaviorEntityChange' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'SpyEventBehaviorEntityChange.IdEventBehaviorEntityChange' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'idEventBehaviorEntityChange' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'spyEventBehaviorEntityChange.idEventBehaviorEntityChange' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'id_event_behavior_entity_change' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'spy_event_behavior_entity_change.id_event_behavior_entity_change' => 'ID_EVENT_BEHAVIOR_ENTITY_CHANGE',
        'Data' => 'DATA',
        'SpyEventBehaviorEntityChange.Data' => 'DATA',
        'data' => 'DATA',
        'spyEventBehaviorEntityChange.data' => 'DATA',
        'SpyEventBehaviorEntityChangeTableMap::COL_DATA' => 'DATA',
        'COL_DATA' => 'DATA',
        'spy_event_behavior_entity_change.data' => 'DATA',
        'ProcessId' => 'PROCESS_ID',
        'SpyEventBehaviorEntityChange.ProcessId' => 'PROCESS_ID',
        'processId' => 'PROCESS_ID',
        'spyEventBehaviorEntityChange.processId' => 'PROCESS_ID',
        'SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID' => 'PROCESS_ID',
        'COL_PROCESS_ID' => 'PROCESS_ID',
        'process_id' => 'PROCESS_ID',
        'spy_event_behavior_entity_change.process_id' => 'PROCESS_ID',
        'CreatedAt' => 'CREATED_AT',
        'SpyEventBehaviorEntityChange.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'spyEventBehaviorEntityChange.createdAt' => 'CREATED_AT',
        'SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'spy_event_behavior_entity_change.created_at' => 'CREATED_AT',
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
        $this->setName('spy_event_behavior_entity_change');
        $this->setPhpName('SpyEventBehaviorEntityChange');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Orm\\Zed\\EventBehavior\\Persistence\\SpyEventBehaviorEntityChange');
        $this->setPackage('Orm.Zed.EventBehavior.Persistence');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_event_behavior_entity_change_pk_seq');
        // columns
        $this->addPrimaryKey('id_event_behavior_entity_change', 'IdEventBehaviorEntityChange', 'BIGINT', true, null, null);
        $this->addColumn('data', 'Data', 'LONGVARCHAR', false, null, null);
        $this->addColumn('process_id', 'ProcessId', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
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
            'timestampable' => ['create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'true'],
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdEventBehaviorEntityChange', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyEventBehaviorEntityChangeTableMap::CLASS_DEFAULT : SpyEventBehaviorEntityChangeTableMap::OM_CLASS;
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
     * @return array (SpyEventBehaviorEntityChange object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SpyEventBehaviorEntityChangeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyEventBehaviorEntityChangeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyEventBehaviorEntityChangeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyEventBehaviorEntityChangeTableMap::OM_CLASS;
            /** @var SpyEventBehaviorEntityChange $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyEventBehaviorEntityChangeTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyEventBehaviorEntityChangeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyEventBehaviorEntityChangeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyEventBehaviorEntityChange $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyEventBehaviorEntityChangeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE);
            $criteria->addSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_DATA);
            $criteria->addSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID);
            $criteria->addSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_event_behavior_entity_change');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.process_id');
            $criteria->addSelectColumn($alias . '.created_at');
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
            $criteria->removeSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE);
            $criteria->removeSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_DATA);
            $criteria->removeSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID);
            $criteria->removeSelectColumn(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.id_event_behavior_entity_change');
            $criteria->removeSelectColumn($alias . '.data');
            $criteria->removeSelectColumn($alias . '.process_id');
            $criteria->removeSelectColumn($alias . '.created_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME)->getTable(SpyEventBehaviorEntityChangeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a SpyEventBehaviorEntityChange or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or SpyEventBehaviorEntityChange object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChange) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);
            $criteria->add(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, (array) $values, Criteria::IN);
        }

        $query = SpyEventBehaviorEntityChangeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyEventBehaviorEntityChangeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyEventBehaviorEntityChangeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_event_behavior_entity_change table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SpyEventBehaviorEntityChangeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyEventBehaviorEntityChange or Criteria object.
     *
     * @param mixed $criteria Criteria or SpyEventBehaviorEntityChange object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyEventBehaviorEntityChange object
        }

        if ($criteria->containsKey(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE) && $criteria->keyContainsValue(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE.')');
        }


        // Set the correct dbName
        $query = SpyEventBehaviorEntityChangeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
