<?php

namespace Orm\Zed\Locale\Persistence\Map;

use Orm\Zed\Locale\Persistence\SpyLocaleStore;
use Orm\Zed\Locale\Persistence\SpyLocaleStoreQuery;
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
 * This class defines the structure of the 'spy_locale_store' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SpyLocaleStoreTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'Orm.Zed.Locale.Persistence.Map.SpyLocaleStoreTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'spy_locale_store';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'SpyLocaleStore';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Orm\\Zed\\Locale\\Persistence\\SpyLocaleStore';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Orm.Zed.Locale.Persistence.SpyLocaleStore';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id_locale_store field
     */
    public const COL_ID_LOCALE_STORE = 'spy_locale_store.id_locale_store';

    /**
     * the column name for the fk_locale field
     */
    public const COL_FK_LOCALE = 'spy_locale_store.fk_locale';

    /**
     * the column name for the fk_store field
     */
    public const COL_FK_STORE = 'spy_locale_store.fk_store';

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
        self::TYPE_PHPNAME       => ['IdLocaleStore', 'FkLocale', 'FkStore', ],
        self::TYPE_CAMELNAME     => ['idLocaleStore', 'fkLocale', 'fkStore', ],
        self::TYPE_COLNAME       => [SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE, SpyLocaleStoreTableMap::COL_FK_LOCALE, SpyLocaleStoreTableMap::COL_FK_STORE, ],
        self::TYPE_FIELDNAME     => ['id_locale_store', 'fk_locale', 'fk_store', ],
        self::TYPE_NUM           => [0, 1, 2, ]
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
        self::TYPE_PHPNAME       => ['IdLocaleStore' => 0, 'FkLocale' => 1, 'FkStore' => 2, ],
        self::TYPE_CAMELNAME     => ['idLocaleStore' => 0, 'fkLocale' => 1, 'fkStore' => 2, ],
        self::TYPE_COLNAME       => [SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE => 0, SpyLocaleStoreTableMap::COL_FK_LOCALE => 1, SpyLocaleStoreTableMap::COL_FK_STORE => 2, ],
        self::TYPE_FIELDNAME     => ['id_locale_store' => 0, 'fk_locale' => 1, 'fk_store' => 2, ],
        self::TYPE_NUM           => [0, 1, 2, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'IdLocaleStore' => 'ID_LOCALE_STORE',
        'SpyLocaleStore.IdLocaleStore' => 'ID_LOCALE_STORE',
        'idLocaleStore' => 'ID_LOCALE_STORE',
        'spyLocaleStore.idLocaleStore' => 'ID_LOCALE_STORE',
        'SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE' => 'ID_LOCALE_STORE',
        'COL_ID_LOCALE_STORE' => 'ID_LOCALE_STORE',
        'id_locale_store' => 'ID_LOCALE_STORE',
        'spy_locale_store.id_locale_store' => 'ID_LOCALE_STORE',
        'FkLocale' => 'FK_LOCALE',
        'SpyLocaleStore.FkLocale' => 'FK_LOCALE',
        'fkLocale' => 'FK_LOCALE',
        'spyLocaleStore.fkLocale' => 'FK_LOCALE',
        'SpyLocaleStoreTableMap::COL_FK_LOCALE' => 'FK_LOCALE',
        'COL_FK_LOCALE' => 'FK_LOCALE',
        'fk_locale' => 'FK_LOCALE',
        'spy_locale_store.fk_locale' => 'FK_LOCALE',
        'FkStore' => 'FK_STORE',
        'SpyLocaleStore.FkStore' => 'FK_STORE',
        'fkStore' => 'FK_STORE',
        'spyLocaleStore.fkStore' => 'FK_STORE',
        'SpyLocaleStoreTableMap::COL_FK_STORE' => 'FK_STORE',
        'COL_FK_STORE' => 'FK_STORE',
        'fk_store' => 'FK_STORE',
        'spy_locale_store.fk_store' => 'FK_STORE',
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
        $this->setName('spy_locale_store');
        $this->setPhpName('SpyLocaleStore');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Orm\\Zed\\Locale\\Persistence\\SpyLocaleStore');
        $this->setPackage('Orm.Zed.Locale.Persistence');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_locale_store_pk_seq');
        // columns
        $this->addPrimaryKey('id_locale_store', 'IdLocaleStore', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_locale', 'FkLocale', 'INTEGER', 'spy_locale', 'id_locale', true, null, null);
        $this->addForeignKey('fk_store', 'FkStore', 'INTEGER', 'spy_store', 'id_store', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Locale', '\\Orm\\Zed\\Locale\\Persistence\\SpyLocale', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_locale',
    1 => ':id_locale',
  ),
), null, null, null, false);
        $this->addRelation('Store', '\\Orm\\Zed\\Store\\Persistence\\SpyStore', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_store',
    1 => ':id_store',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdLocaleStore', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyLocaleStoreTableMap::CLASS_DEFAULT : SpyLocaleStoreTableMap::OM_CLASS;
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
     * @return array (SpyLocaleStore object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SpyLocaleStoreTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyLocaleStoreTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyLocaleStoreTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyLocaleStoreTableMap::OM_CLASS;
            /** @var SpyLocaleStore $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyLocaleStoreTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyLocaleStoreTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyLocaleStoreTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyLocaleStore $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyLocaleStoreTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE);
            $criteria->addSelectColumn(SpyLocaleStoreTableMap::COL_FK_LOCALE);
            $criteria->addSelectColumn(SpyLocaleStoreTableMap::COL_FK_STORE);
        } else {
            $criteria->addSelectColumn($alias . '.id_locale_store');
            $criteria->addSelectColumn($alias . '.fk_locale');
            $criteria->addSelectColumn($alias . '.fk_store');
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
            $criteria->removeSelectColumn(SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE);
            $criteria->removeSelectColumn(SpyLocaleStoreTableMap::COL_FK_LOCALE);
            $criteria->removeSelectColumn(SpyLocaleStoreTableMap::COL_FK_STORE);
        } else {
            $criteria->removeSelectColumn($alias . '.id_locale_store');
            $criteria->removeSelectColumn($alias . '.fk_locale');
            $criteria->removeSelectColumn($alias . '.fk_store');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyLocaleStoreTableMap::DATABASE_NAME)->getTable(SpyLocaleStoreTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a SpyLocaleStore or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or SpyLocaleStore object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleStoreTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Orm\Zed\Locale\Persistence\SpyLocaleStore) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyLocaleStoreTableMap::DATABASE_NAME);
            $criteria->add(SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE, (array) $values, Criteria::IN);
        }

        $query = SpyLocaleStoreQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyLocaleStoreTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyLocaleStoreTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_locale_store table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SpyLocaleStoreQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyLocaleStore or Criteria object.
     *
     * @param mixed $criteria Criteria or SpyLocaleStore object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleStoreTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyLocaleStore object
        }

        if ($criteria->containsKey(SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE) && $criteria->keyContainsValue(SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyLocaleStoreTableMap::COL_ID_LOCALE_STORE.')');
        }


        // Set the correct dbName
        $query = SpyLocaleStoreQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
