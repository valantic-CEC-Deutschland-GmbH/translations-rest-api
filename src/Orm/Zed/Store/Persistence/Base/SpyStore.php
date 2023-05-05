<?php

namespace Orm\Zed\Store\Persistence\Base;

use \Exception;
use \PDO;
use Orm\Zed\Currency\Persistence\SpyCurrency;
use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\Currency\Persistence\SpyCurrencyStore;
use Orm\Zed\Currency\Persistence\SpyCurrencyStoreQuery;
use Orm\Zed\Currency\Persistence\Base\SpyCurrencyStore as BaseSpyCurrencyStore;
use Orm\Zed\Currency\Persistence\Map\SpyCurrencyStoreTableMap;
use Orm\Zed\Locale\Persistence\SpyLocale;
use Orm\Zed\Locale\Persistence\SpyLocaleQuery;
use Orm\Zed\Locale\Persistence\SpyLocaleStore;
use Orm\Zed\Locale\Persistence\SpyLocaleStoreQuery;
use Orm\Zed\Locale\Persistence\Base\SpyLocaleStore as BaseSpyLocaleStore;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleStoreTableMap;
use Orm\Zed\Store\Persistence\SpyStore as ChildSpyStore;
use Orm\Zed\Store\Persistence\SpyStoreQuery as ChildSpyStoreQuery;
use Orm\Zed\Store\Persistence\Map\SpyStoreTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchSearch;
use Orm\Zed\Touch\Persistence\SpyTouchSearchQuery;
use Orm\Zed\Touch\Persistence\SpyTouchStorage;
use Orm\Zed\Touch\Persistence\SpyTouchStorageQuery;
use Orm\Zed\Touch\Persistence\Base\SpyTouchSearch as BaseSpyTouchSearch;
use Orm\Zed\Touch\Persistence\Base\SpyTouchStorage as BaseSpyTouchStorage;
use Orm\Zed\Touch\Persistence\Map\SpyTouchSearchTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchStorageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'spy_store' table.
 *
 *
 *
 * @package    propel.generator.Orm.Zed.Store.Persistence.Base
 */
abstract class SpyStore implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Orm\\Zed\\Store\\Persistence\\Map\\SpyStoreTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var bool
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var bool
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = [];

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = [];

    /**
     * The value for the id_store field.
     *
     * @var        int
     */
    protected $id_store;

    /**
     * The value for the fk_currency field.
     * Default currency for the store.
     * @var        int|null
     */
    protected $fk_currency;

    /**
     * The value for the fk_locale field.
     * Default locale of the store.
     * @var        int|null
     */
    protected $fk_locale;

    /**
     * The value for the name field.
     *
     * @var        string|null
     */
    protected $name;

    /**
     * @var        SpyCurrency
     */
    protected $aDefaultCurrency;

    /**
     * @var        SpyLocale
     */
    protected $aDefaultLocale;

    /**
     * @var        ObjectCollection|SpyCurrencyStore[] Collection to store aggregation of SpyCurrencyStore objects.
     * @phpstan-var ObjectCollection&\Traversable<SpyCurrencyStore> Collection to store aggregation of SpyCurrencyStore objects.
     */
    protected $collCurrencyStores;
    protected $collCurrencyStoresPartial;

    /**
     * @var        ObjectCollection|SpyLocaleStore[] Collection to store aggregation of SpyLocaleStore objects.
     * @phpstan-var ObjectCollection&\Traversable<SpyLocaleStore> Collection to store aggregation of SpyLocaleStore objects.
     */
    protected $collLocaleStores;
    protected $collLocaleStoresPartial;

    /**
     * @var        ObjectCollection|SpyTouchStorage[] Collection to store aggregation of SpyTouchStorage objects.
     * @phpstan-var ObjectCollection&\Traversable<SpyTouchStorage> Collection to store aggregation of SpyTouchStorage objects.
     */
    protected $collTouchStorages;
    protected $collTouchStoragesPartial;

    /**
     * @var        ObjectCollection|SpyTouchSearch[] Collection to store aggregation of SpyTouchSearch objects.
     * @phpstan-var ObjectCollection&\Traversable<SpyTouchSearch> Collection to store aggregation of SpyTouchSearch objects.
     */
    protected $collTouchSearches;
    protected $collTouchSearchesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|SpyCurrencyStore[]
     * @phpstan-var ObjectCollection&\Traversable<SpyCurrencyStore>
     */
    protected $currencyStoresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|SpyLocaleStore[]
     * @phpstan-var ObjectCollection&\Traversable<SpyLocaleStore>
     */
    protected $localeStoresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|SpyTouchStorage[]
     * @phpstan-var ObjectCollection&\Traversable<SpyTouchStorage>
     */
    protected $touchStoragesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|SpyTouchSearch[]
     * @phpstan-var ObjectCollection&\Traversable<SpyTouchSearch>
     */
    protected $touchSearchesScheduledForDeletion = null;

    /**
     * Initializes internal state of Orm\Zed\Store\Persistence\Base\SpyStore object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return bool True if the object has been modified.
     */
    public function isModified(): bool
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param string $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return bool True if $col has been modified.
     */
    public function isColumnModified(string $col): bool
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns(): array
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return bool True, if the object has never been persisted.
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param bool $b the state of the object.
     */
    public function setNew(bool $b): void
    {
        $this->new = $b;
    }

    /**
     * Whether this object has been deleted.
     * @return bool The deleted state of this object.
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param bool $b The deleted state of this object.
     * @return void
     */
    public function setDeleted(bool $b): void
    {
        $this->deleted = $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified(?string $col = null): void
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = [];
        }
    }

    /**
     * Compares this with another <code>SpyStore</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyStore</code>, delegates to
     * <code>equals(SpyStore)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param mixed $obj The object to compare to.
     * @return bool Whether equal to the object specified.
     */
    public function equals($obj): bool
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns(): array
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return bool
     */
    public function hasVirtualColumn(string $name): bool
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return mixed
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getVirtualColumn(string $name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of nonexistent virtual column `%s`.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @param mixed $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn(string $name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param string $msg
     * @param int $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log(string $msg, int $priority = Propel::LOG_INFO): void
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param \Propel\Runtime\Parser\AbstractParser|string $parser An AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string The exported data
     */
    public function exportTo($parser, bool $includeLazyLoadColumns = true, string $keyType = TableMap::TYPE_PHPNAME): string
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     *
     * @return array<string>
     */
    public function __sleep(): array
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id_store] column value.
     *
     * @return int
     */
    public function getIdStore()
    {
        return $this->id_store;
    }

    /**
     * Get the [fk_currency] column value.
     * Default currency for the store.
     * @return int|null
     */
    public function getFkCurrency()
    {
        return $this->fk_currency;
    }

    /**
     * Get the [fk_locale] column value.
     * Default locale of the store.
     * @return int|null
     */
    public function getFkLocale()
    {
        return $this->fk_locale;
    }

    /**
     * Get the [name] column value.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of [id_store] column.
     *
     * @param int $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setIdStore($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_store !== $v) {
            $this->id_store = $v;
            $this->modifiedColumns[SpyStoreTableMap::COL_ID_STORE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [fk_currency] column.
     * Default currency for the store.
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFkCurrency($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_currency !== $v) {
            $this->fk_currency = $v;
            $this->modifiedColumns[SpyStoreTableMap::COL_FK_CURRENCY] = true;
        }

        if ($this->aDefaultCurrency !== null && $this->aDefaultCurrency->getIdCurrency() !== $v) {
            $this->aDefaultCurrency = null;
        }

        return $this;
    }

    /**
     * Set the value of [fk_locale] column.
     * Default locale of the store.
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFkLocale($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_locale !== $v) {
            $this->fk_locale = $v;
            $this->modifiedColumns[SpyStoreTableMap::COL_FK_LOCALE] = true;
        }

        if ($this->aDefaultLocale !== null && $this->aDefaultLocale->getIdLocale() !== $v) {
            $this->aDefaultLocale = null;
        }

        return $this;
    }

    /**
     * Set the value of [name] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyStoreTableMap::COL_NAME] = true;
        }

        return $this;
    }

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return bool Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues(): bool
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    }

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by DataFetcher->fetch().
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param bool $rehydrate Whether this object is being re-hydrated from the database.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int next starting column
     * @throws \Propel\Runtime\Exception\PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate(array $row, int $startcol = 0, bool $rehydrate = false, string $indexType = TableMap::TYPE_NUM): int
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyStoreTableMap::translateFieldName('IdStore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_store = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyStoreTableMap::translateFieldName('FkCurrency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_currency = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyStoreTableMap::translateFieldName('FkLocale', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_locale = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyStoreTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyStoreTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Orm\\Zed\\Store\\Persistence\\SpyStore'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function ensureConsistency(): void
    {
        if ($this->aDefaultCurrency !== null && $this->fk_currency !== $this->aDefaultCurrency->getIdCurrency()) {
            $this->aDefaultCurrency = null;
        }
        if ($this->aDefaultLocale !== null && $this->fk_locale !== $this->aDefaultLocale->getIdLocale()) {
            $this->aDefaultLocale = null;
        }
    }

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param bool $deep (optional) Whether to also de-associated any related objects.
     * @param ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload(bool $deep = false, ?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyStoreTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyStoreQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDefaultCurrency = null;
            $this->aDefaultLocale = null;
            $this->collCurrencyStores = null;

            $this->collLocaleStores = null;

            $this->collTouchStorages = null;

            $this->collTouchSearches = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param ConnectionInterface $con
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @see SpyStore::setDeleted()
     * @see SpyStore::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyStoreTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyStoreQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    public function save(?ConnectionInterface $con = null): int
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyStoreTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SpyStoreTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con): int
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aDefaultCurrency !== null) {
                if ($this->aDefaultCurrency->isModified() || $this->aDefaultCurrency->isNew()) {
                    $affectedRows += $this->aDefaultCurrency->save($con);
                }
                $this->setDefaultCurrency($this->aDefaultCurrency);
            }

            if ($this->aDefaultLocale !== null) {
                if ($this->aDefaultLocale->isModified() || $this->aDefaultLocale->isNew()) {
                    $affectedRows += $this->aDefaultLocale->save($con);
                }
                $this->setDefaultLocale($this->aDefaultLocale);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->currencyStoresScheduledForDeletion !== null) {
                if (!$this->currencyStoresScheduledForDeletion->isEmpty()) {
                    \Orm\Zed\Currency\Persistence\SpyCurrencyStoreQuery::create()
                        ->filterByPrimaryKeys($this->currencyStoresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->currencyStoresScheduledForDeletion = null;
                }
            }

            if ($this->collCurrencyStores !== null) {
                foreach ($this->collCurrencyStores as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->localeStoresScheduledForDeletion !== null) {
                if (!$this->localeStoresScheduledForDeletion->isEmpty()) {
                    \Orm\Zed\Locale\Persistence\SpyLocaleStoreQuery::create()
                        ->filterByPrimaryKeys($this->localeStoresScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->localeStoresScheduledForDeletion = null;
                }
            }

            if ($this->collLocaleStores !== null) {
                foreach ($this->collLocaleStores as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->touchStoragesScheduledForDeletion !== null) {
                if (!$this->touchStoragesScheduledForDeletion->isEmpty()) {
                    foreach ($this->touchStoragesScheduledForDeletion as $touchStorage) {
                        // need to save related object because we set the relation to null
                        $touchStorage->save($con);
                    }
                    $this->touchStoragesScheduledForDeletion = null;
                }
            }

            if ($this->collTouchStorages !== null) {
                foreach ($this->collTouchStorages as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->touchSearchesScheduledForDeletion !== null) {
                if (!$this->touchSearchesScheduledForDeletion->isEmpty()) {
                    foreach ($this->touchSearchesScheduledForDeletion as $touchSearch) {
                        // need to save related object because we set the relation to null
                        $touchSearch->save($con);
                    }
                    $this->touchSearchesScheduledForDeletion = null;
                }
            }

            if ($this->collTouchSearches !== null) {
                foreach ($this->collTouchSearches as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    }

    /**
     * Insert the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con): void
    {
        $modifiedColumns = [];
        $index = 0;

        $this->modifiedColumns[SpyStoreTableMap::COL_ID_STORE] = true;
        if (null !== $this->id_store) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyStoreTableMap::COL_ID_STORE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyStoreTableMap::COL_ID_STORE)) {
            $modifiedColumns[':p' . $index++]  = 'id_store';
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_FK_CURRENCY)) {
            $modifiedColumns[':p' . $index++]  = 'fk_currency';
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_FK_LOCALE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_locale';
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }

        $sql = sprintf(
            'INSERT INTO spy_store (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_store':
                        $stmt->bindValue($identifier, $this->id_store, PDO::PARAM_INT);

                        break;
                    case 'fk_currency':
                        $stmt->bindValue($identifier, $this->fk_currency, PDO::PARAM_INT);

                        break;
                    case 'fk_locale':
                        $stmt->bindValue($identifier, $this->fk_locale, PDO::PARAM_INT);

                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);

                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_store_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdStore($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @return int Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con): int
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName(string $name, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SpyStoreTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos Position in XML schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition(int $pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdStore();

            case 1:
                return $this->getFkCurrency();

            case 2:
                return $this->getFkLocale();

            case 3:
                return $this->getName();

            default:
                return null;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param bool $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array An associative array containing the field names (as keys) and field values
     */
    public function toArray(string $keyType = TableMap::TYPE_PHPNAME, bool $includeLazyLoadColumns = true, array $alreadyDumpedObjects = [], bool $includeForeignObjects = false): array
    {
        if (isset($alreadyDumpedObjects['SpyStore'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['SpyStore'][$this->hashCode()] = true;
        $keys = SpyStoreTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getIdStore(),
            $keys[1] => $this->getFkCurrency(),
            $keys[2] => $this->getFkLocale(),
            $keys[3] => $this->getName(),
        ];
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aDefaultCurrency) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCurrency';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_currency';
                        break;
                    default:
                        $key = 'DefaultCurrency';
                }

                $result[$key] = $this->aDefaultCurrency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDefaultLocale) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocale';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_locale';
                        break;
                    default:
                        $key = 'DefaultLocale';
                }

                $result[$key] = $this->aDefaultLocale->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCurrencyStores) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCurrencyStores';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_currency_stores';
                        break;
                    default:
                        $key = 'CurrencyStores';
                }

                $result[$key] = $this->collCurrencyStores->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLocaleStores) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocaleStores';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_locale_stores';
                        break;
                    default:
                        $key = 'LocaleStores';
                }

                $result[$key] = $this->collLocaleStores->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTouchStorages) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTouchStorages';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_touch_storages';
                        break;
                    default:
                        $key = 'TouchStorages';
                }

                $result[$key] = $this->collTouchStorages->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTouchSearches) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyTouchSearches';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_touch_searches';
                        break;
                    default:
                        $key = 'TouchSearches';
                }

                $result[$key] = $this->collTouchSearches->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this
     */
    public function setByName(string $name, $value, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SpyStoreTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        $this->setByPosition($pos, $value);

        return $this;
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return $this
     */
    public function setByPosition(int $pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdStore($value);
                break;
            case 1:
                $this->setFkCurrency($value);
                break;
            case 2:
                $this->setFkLocale($value);
                break;
            case 3:
                $this->setName($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param array $arr An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return $this
     */
    public function fromArray(array $arr, string $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SpyStoreTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdStore($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkCurrency($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkLocale($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setName($arr[$keys[3]]);
        }

        return $this;
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this The current object, for fluid interface
     */
    public function importFrom($parser, string $data, string $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria(): Criteria
    {
        $criteria = new Criteria(SpyStoreTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyStoreTableMap::COL_ID_STORE)) {
            $criteria->add(SpyStoreTableMap::COL_ID_STORE, $this->id_store);
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_FK_CURRENCY)) {
            $criteria->add(SpyStoreTableMap::COL_FK_CURRENCY, $this->fk_currency);
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_FK_LOCALE)) {
            $criteria->add(SpyStoreTableMap::COL_FK_LOCALE, $this->fk_locale);
        }
        if ($this->isColumnModified(SpyStoreTableMap::COL_NAME)) {
            $criteria->add(SpyStoreTableMap::COL_NAME, $this->name);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria(): Criteria
    {
        $criteria = ChildSpyStoreQuery::create();
        $criteria->add(SpyStoreTableMap::COL_ID_STORE, $this->id_store);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int|string Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdStore();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdStore();
    }

    /**
     * Generic method to set the primary key (id_store column).
     *
     * @param int|null $key Primary key.
     * @return void
     */
    public function setPrimaryKey(?int $key = null): void
    {
        $this->setIdStore($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return null === $this->getIdStore();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Orm\Zed\Store\Persistence\SpyStore (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setFkCurrency($this->getFkCurrency());
        $copyObj->setFkLocale($this->getFkLocale());
        $copyObj->setName($this->getName());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCurrencyStores() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCurrencyStore($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLocaleStores() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLocaleStore($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTouchStorages() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTouchStorage($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTouchSearches() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTouchSearch($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdStore(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Orm\Zed\Store\Persistence\SpyStore Clone of current object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function copy(bool $deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a SpyCurrency object.
     *
     * @param SpyCurrency|null $v
     * @return $this The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setDefaultCurrency(SpyCurrency $v = null)
    {
        if ($v === null) {
            $this->setFkCurrency(NULL);
        } else {
            $this->setFkCurrency($v->getIdCurrency());
        }

        $this->aDefaultCurrency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SpyCurrency object, it will not be re-added.
        if ($v !== null) {
            $v->addStoreDefault($this);
        }


        return $this;
    }


    /**
     * Get the associated SpyCurrency object
     *
     * @param ConnectionInterface $con Optional Connection object.
     * @return SpyCurrency|null The associated SpyCurrency object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getDefaultCurrency(?ConnectionInterface $con = null)
    {
        if ($this->aDefaultCurrency === null && ($this->fk_currency != 0)) {
            $this->aDefaultCurrency = SpyCurrencyQuery::create()->findPk($this->fk_currency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDefaultCurrency->addStoreDefaults($this);
             */
        }

        return $this->aDefaultCurrency;
    }

    /**
     * Declares an association between this object and a SpyLocale object.
     *
     * @param SpyLocale|null $v
     * @return $this The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setDefaultLocale(SpyLocale $v = null)
    {
        if ($v === null) {
            $this->setFkLocale(NULL);
        } else {
            $this->setFkLocale($v->getIdLocale());
        }

        $this->aDefaultLocale = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SpyLocale object, it will not be re-added.
        if ($v !== null) {
            $v->addStoreDefault($this);
        }


        return $this;
    }


    /**
     * Get the associated SpyLocale object
     *
     * @param ConnectionInterface $con Optional Connection object.
     * @return SpyLocale|null The associated SpyLocale object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getDefaultLocale(?ConnectionInterface $con = null)
    {
        if ($this->aDefaultLocale === null && ($this->fk_locale != 0)) {
            $this->aDefaultLocale = SpyLocaleQuery::create()->findPk($this->fk_locale, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDefaultLocale->addStoreDefaults($this);
             */
        }

        return $this->aDefaultLocale;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName): void
    {
        if ('CurrencyStore' === $relationName) {
            $this->initCurrencyStores();
            return;
        }
        if ('LocaleStore' === $relationName) {
            $this->initLocaleStores();
            return;
        }
        if ('TouchStorage' === $relationName) {
            $this->initTouchStorages();
            return;
        }
        if ('TouchSearch' === $relationName) {
            $this->initTouchSearches();
            return;
        }
    }

    /**
     * Clears out the collCurrencyStores collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return $this
     * @see addCurrencyStores()
     */
    public function clearCurrencyStores()
    {
        $this->collCurrencyStores = null; // important to set this to NULL since that means it is uninitialized

        return $this;
    }

    /**
     * Reset is the collCurrencyStores collection loaded partially.
     *
     * @return void
     */
    public function resetPartialCurrencyStores($v = true): void
    {
        $this->collCurrencyStoresPartial = $v;
    }

    /**
     * Initializes the collCurrencyStores collection.
     *
     * By default this just sets the collCurrencyStores collection to an empty array (like clearcollCurrencyStores());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param bool $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCurrencyStores(bool $overrideExisting = true): void
    {
        if (null !== $this->collCurrencyStores && !$overrideExisting) {
            return;
        }

        $collectionClassName = SpyCurrencyStoreTableMap::getTableMap()->getCollectionClassName();

        $this->collCurrencyStores = new $collectionClassName;
        $this->collCurrencyStores->setModel('\Orm\Zed\Currency\Persistence\SpyCurrencyStore');
    }

    /**
     * Gets an array of SpyCurrencyStore objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|SpyCurrencyStore[] List of SpyCurrencyStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyCurrencyStore> List of SpyCurrencyStore objects
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getCurrencyStores(?Criteria $criteria = null, ?ConnectionInterface $con = null)
    {
        $partial = $this->collCurrencyStoresPartial && !$this->isNew();
        if (null === $this->collCurrencyStores || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collCurrencyStores) {
                    $this->initCurrencyStores();
                } else {
                    $collectionClassName = SpyCurrencyStoreTableMap::getTableMap()->getCollectionClassName();

                    $collCurrencyStores = new $collectionClassName;
                    $collCurrencyStores->setModel('\Orm\Zed\Currency\Persistence\SpyCurrencyStore');

                    return $collCurrencyStores;
                }
            } else {
                $collCurrencyStores = SpyCurrencyStoreQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCurrencyStoresPartial && count($collCurrencyStores)) {
                        $this->initCurrencyStores(false);

                        foreach ($collCurrencyStores as $obj) {
                            if (false == $this->collCurrencyStores->contains($obj)) {
                                $this->collCurrencyStores->append($obj);
                            }
                        }

                        $this->collCurrencyStoresPartial = true;
                    }

                    return $collCurrencyStores;
                }

                if ($partial && $this->collCurrencyStores) {
                    foreach ($this->collCurrencyStores as $obj) {
                        if ($obj->isNew()) {
                            $collCurrencyStores[] = $obj;
                        }
                    }
                }

                $this->collCurrencyStores = $collCurrencyStores;
                $this->collCurrencyStoresPartial = false;
            }
        }

        return $this->collCurrencyStores;
    }

    /**
     * Sets a collection of SpyCurrencyStore objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param Collection $currencyStores A Propel collection.
     * @param ConnectionInterface $con Optional connection object
     * @return $this The current object (for fluent API support)
     */
    public function setCurrencyStores(Collection $currencyStores, ?ConnectionInterface $con = null)
    {
        /** @var SpyCurrencyStore[] $currencyStoresToDelete */
        $currencyStoresToDelete = $this->getCurrencyStores(new Criteria(), $con)->diff($currencyStores);


        $this->currencyStoresScheduledForDeletion = $currencyStoresToDelete;

        foreach ($currencyStoresToDelete as $currencyStoreRemoved) {
            $currencyStoreRemoved->setStore(null);
        }

        $this->collCurrencyStores = null;
        foreach ($currencyStores as $currencyStore) {
            $this->addCurrencyStore($currencyStore);
        }

        $this->collCurrencyStores = $currencyStores;
        $this->collCurrencyStoresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseSpyCurrencyStore objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related BaseSpyCurrencyStore objects.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function countCurrencyStores(?Criteria $criteria = null, bool $distinct = false, ?ConnectionInterface $con = null): int
    {
        $partial = $this->collCurrencyStoresPartial && !$this->isNew();
        if (null === $this->collCurrencyStores || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCurrencyStores) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCurrencyStores());
            }

            $query = SpyCurrencyStoreQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collCurrencyStores);
    }

    /**
     * Method called to associate a SpyCurrencyStore object to this object
     * through the SpyCurrencyStore foreign key attribute.
     *
     * @param SpyCurrencyStore $l SpyCurrencyStore
     * @return $this The current object (for fluent API support)
     */
    public function addCurrencyStore(SpyCurrencyStore $l)
    {
        if ($this->collCurrencyStores === null) {
            $this->initCurrencyStores();
            $this->collCurrencyStoresPartial = true;
        }

        if (!$this->collCurrencyStores->contains($l)) {
            $this->doAddCurrencyStore($l);

            if ($this->currencyStoresScheduledForDeletion and $this->currencyStoresScheduledForDeletion->contains($l)) {
                $this->currencyStoresScheduledForDeletion->remove($this->currencyStoresScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param SpyCurrencyStore $currencyStore The SpyCurrencyStore object to add.
     */
    protected function doAddCurrencyStore(SpyCurrencyStore $currencyStore): void
    {
        $this->collCurrencyStores[]= $currencyStore;
        $currencyStore->setStore($this);
    }

    /**
     * @param SpyCurrencyStore $currencyStore The SpyCurrencyStore object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeCurrencyStore(SpyCurrencyStore $currencyStore)
    {
        if ($this->getCurrencyStores()->contains($currencyStore)) {
            $pos = $this->collCurrencyStores->search($currencyStore);
            $this->collCurrencyStores->remove($pos);
            if (null === $this->currencyStoresScheduledForDeletion) {
                $this->currencyStoresScheduledForDeletion = clone $this->collCurrencyStores;
                $this->currencyStoresScheduledForDeletion->clear();
            }
            $this->currencyStoresScheduledForDeletion[]= clone $currencyStore;
            $currencyStore->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related CurrencyStores from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyCurrencyStore[] List of SpyCurrencyStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyCurrencyStore}> List of SpyCurrencyStore objects
     */
    public function getCurrencyStoresJoinCurrency(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyCurrencyStoreQuery::create(null, $criteria);
        $query->joinWith('Currency', $joinBehavior);

        return $this->getCurrencyStores($query, $con);
    }

    /**
     * Clears out the collLocaleStores collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return $this
     * @see addLocaleStores()
     */
    public function clearLocaleStores()
    {
        $this->collLocaleStores = null; // important to set this to NULL since that means it is uninitialized

        return $this;
    }

    /**
     * Reset is the collLocaleStores collection loaded partially.
     *
     * @return void
     */
    public function resetPartialLocaleStores($v = true): void
    {
        $this->collLocaleStoresPartial = $v;
    }

    /**
     * Initializes the collLocaleStores collection.
     *
     * By default this just sets the collLocaleStores collection to an empty array (like clearcollLocaleStores());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param bool $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLocaleStores(bool $overrideExisting = true): void
    {
        if (null !== $this->collLocaleStores && !$overrideExisting) {
            return;
        }

        $collectionClassName = SpyLocaleStoreTableMap::getTableMap()->getCollectionClassName();

        $this->collLocaleStores = new $collectionClassName;
        $this->collLocaleStores->setModel('\Orm\Zed\Locale\Persistence\SpyLocaleStore');
    }

    /**
     * Gets an array of SpyLocaleStore objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|SpyLocaleStore[] List of SpyLocaleStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyLocaleStore> List of SpyLocaleStore objects
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getLocaleStores(?Criteria $criteria = null, ?ConnectionInterface $con = null)
    {
        $partial = $this->collLocaleStoresPartial && !$this->isNew();
        if (null === $this->collLocaleStores || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collLocaleStores) {
                    $this->initLocaleStores();
                } else {
                    $collectionClassName = SpyLocaleStoreTableMap::getTableMap()->getCollectionClassName();

                    $collLocaleStores = new $collectionClassName;
                    $collLocaleStores->setModel('\Orm\Zed\Locale\Persistence\SpyLocaleStore');

                    return $collLocaleStores;
                }
            } else {
                $collLocaleStores = SpyLocaleStoreQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collLocaleStoresPartial && count($collLocaleStores)) {
                        $this->initLocaleStores(false);

                        foreach ($collLocaleStores as $obj) {
                            if (false == $this->collLocaleStores->contains($obj)) {
                                $this->collLocaleStores->append($obj);
                            }
                        }

                        $this->collLocaleStoresPartial = true;
                    }

                    return $collLocaleStores;
                }

                if ($partial && $this->collLocaleStores) {
                    foreach ($this->collLocaleStores as $obj) {
                        if ($obj->isNew()) {
                            $collLocaleStores[] = $obj;
                        }
                    }
                }

                $this->collLocaleStores = $collLocaleStores;
                $this->collLocaleStoresPartial = false;
            }
        }

        return $this->collLocaleStores;
    }

    /**
     * Sets a collection of SpyLocaleStore objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param Collection $localeStores A Propel collection.
     * @param ConnectionInterface $con Optional connection object
     * @return $this The current object (for fluent API support)
     */
    public function setLocaleStores(Collection $localeStores, ?ConnectionInterface $con = null)
    {
        /** @var SpyLocaleStore[] $localeStoresToDelete */
        $localeStoresToDelete = $this->getLocaleStores(new Criteria(), $con)->diff($localeStores);


        $this->localeStoresScheduledForDeletion = $localeStoresToDelete;

        foreach ($localeStoresToDelete as $localeStoreRemoved) {
            $localeStoreRemoved->setStore(null);
        }

        $this->collLocaleStores = null;
        foreach ($localeStores as $localeStore) {
            $this->addLocaleStore($localeStore);
        }

        $this->collLocaleStores = $localeStores;
        $this->collLocaleStoresPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseSpyLocaleStore objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related BaseSpyLocaleStore objects.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function countLocaleStores(?Criteria $criteria = null, bool $distinct = false, ?ConnectionInterface $con = null): int
    {
        $partial = $this->collLocaleStoresPartial && !$this->isNew();
        if (null === $this->collLocaleStores || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLocaleStores) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLocaleStores());
            }

            $query = SpyLocaleStoreQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collLocaleStores);
    }

    /**
     * Method called to associate a SpyLocaleStore object to this object
     * through the SpyLocaleStore foreign key attribute.
     *
     * @param SpyLocaleStore $l SpyLocaleStore
     * @return $this The current object (for fluent API support)
     */
    public function addLocaleStore(SpyLocaleStore $l)
    {
        if ($this->collLocaleStores === null) {
            $this->initLocaleStores();
            $this->collLocaleStoresPartial = true;
        }

        if (!$this->collLocaleStores->contains($l)) {
            $this->doAddLocaleStore($l);

            if ($this->localeStoresScheduledForDeletion and $this->localeStoresScheduledForDeletion->contains($l)) {
                $this->localeStoresScheduledForDeletion->remove($this->localeStoresScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param SpyLocaleStore $localeStore The SpyLocaleStore object to add.
     */
    protected function doAddLocaleStore(SpyLocaleStore $localeStore): void
    {
        $this->collLocaleStores[]= $localeStore;
        $localeStore->setStore($this);
    }

    /**
     * @param SpyLocaleStore $localeStore The SpyLocaleStore object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeLocaleStore(SpyLocaleStore $localeStore)
    {
        if ($this->getLocaleStores()->contains($localeStore)) {
            $pos = $this->collLocaleStores->search($localeStore);
            $this->collLocaleStores->remove($pos);
            if (null === $this->localeStoresScheduledForDeletion) {
                $this->localeStoresScheduledForDeletion = clone $this->collLocaleStores;
                $this->localeStoresScheduledForDeletion->clear();
            }
            $this->localeStoresScheduledForDeletion[]= clone $localeStore;
            $localeStore->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related LocaleStores from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyLocaleStore[] List of SpyLocaleStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyLocaleStore}> List of SpyLocaleStore objects
     */
    public function getLocaleStoresJoinLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyLocaleStoreQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getLocaleStores($query, $con);
    }

    /**
     * Clears out the collTouchStorages collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return $this
     * @see addTouchStorages()
     */
    public function clearTouchStorages()
    {
        $this->collTouchStorages = null; // important to set this to NULL since that means it is uninitialized

        return $this;
    }

    /**
     * Reset is the collTouchStorages collection loaded partially.
     *
     * @return void
     */
    public function resetPartialTouchStorages($v = true): void
    {
        $this->collTouchStoragesPartial = $v;
    }

    /**
     * Initializes the collTouchStorages collection.
     *
     * By default this just sets the collTouchStorages collection to an empty array (like clearcollTouchStorages());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param bool $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTouchStorages(bool $overrideExisting = true): void
    {
        if (null !== $this->collTouchStorages && !$overrideExisting) {
            return;
        }

        $collectionClassName = SpyTouchStorageTableMap::getTableMap()->getCollectionClassName();

        $this->collTouchStorages = new $collectionClassName;
        $this->collTouchStorages->setModel('\Orm\Zed\Touch\Persistence\SpyTouchStorage');
    }

    /**
     * Gets an array of SpyTouchStorage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|SpyTouchStorage[] List of SpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchStorage> List of SpyTouchStorage objects
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getTouchStorages(?Criteria $criteria = null, ?ConnectionInterface $con = null)
    {
        $partial = $this->collTouchStoragesPartial && !$this->isNew();
        if (null === $this->collTouchStorages || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTouchStorages) {
                    $this->initTouchStorages();
                } else {
                    $collectionClassName = SpyTouchStorageTableMap::getTableMap()->getCollectionClassName();

                    $collTouchStorages = new $collectionClassName;
                    $collTouchStorages->setModel('\Orm\Zed\Touch\Persistence\SpyTouchStorage');

                    return $collTouchStorages;
                }
            } else {
                $collTouchStorages = SpyTouchStorageQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTouchStoragesPartial && count($collTouchStorages)) {
                        $this->initTouchStorages(false);

                        foreach ($collTouchStorages as $obj) {
                            if (false == $this->collTouchStorages->contains($obj)) {
                                $this->collTouchStorages->append($obj);
                            }
                        }

                        $this->collTouchStoragesPartial = true;
                    }

                    return $collTouchStorages;
                }

                if ($partial && $this->collTouchStorages) {
                    foreach ($this->collTouchStorages as $obj) {
                        if ($obj->isNew()) {
                            $collTouchStorages[] = $obj;
                        }
                    }
                }

                $this->collTouchStorages = $collTouchStorages;
                $this->collTouchStoragesPartial = false;
            }
        }

        return $this->collTouchStorages;
    }

    /**
     * Sets a collection of SpyTouchStorage objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param Collection $touchStorages A Propel collection.
     * @param ConnectionInterface $con Optional connection object
     * @return $this The current object (for fluent API support)
     */
    public function setTouchStorages(Collection $touchStorages, ?ConnectionInterface $con = null)
    {
        /** @var SpyTouchStorage[] $touchStoragesToDelete */
        $touchStoragesToDelete = $this->getTouchStorages(new Criteria(), $con)->diff($touchStorages);


        $this->touchStoragesScheduledForDeletion = $touchStoragesToDelete;

        foreach ($touchStoragesToDelete as $touchStorageRemoved) {
            $touchStorageRemoved->setStore(null);
        }

        $this->collTouchStorages = null;
        foreach ($touchStorages as $touchStorage) {
            $this->addTouchStorage($touchStorage);
        }

        $this->collTouchStorages = $touchStorages;
        $this->collTouchStoragesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseSpyTouchStorage objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related BaseSpyTouchStorage objects.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function countTouchStorages(?Criteria $criteria = null, bool $distinct = false, ?ConnectionInterface $con = null): int
    {
        $partial = $this->collTouchStoragesPartial && !$this->isNew();
        if (null === $this->collTouchStorages || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTouchStorages) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTouchStorages());
            }

            $query = SpyTouchStorageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collTouchStorages);
    }

    /**
     * Method called to associate a SpyTouchStorage object to this object
     * through the SpyTouchStorage foreign key attribute.
     *
     * @param SpyTouchStorage $l SpyTouchStorage
     * @return $this The current object (for fluent API support)
     */
    public function addTouchStorage(SpyTouchStorage $l)
    {
        if ($this->collTouchStorages === null) {
            $this->initTouchStorages();
            $this->collTouchStoragesPartial = true;
        }

        if (!$this->collTouchStorages->contains($l)) {
            $this->doAddTouchStorage($l);

            if ($this->touchStoragesScheduledForDeletion and $this->touchStoragesScheduledForDeletion->contains($l)) {
                $this->touchStoragesScheduledForDeletion->remove($this->touchStoragesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param SpyTouchStorage $touchStorage The SpyTouchStorage object to add.
     */
    protected function doAddTouchStorage(SpyTouchStorage $touchStorage): void
    {
        $this->collTouchStorages[]= $touchStorage;
        $touchStorage->setStore($this);
    }

    /**
     * @param SpyTouchStorage $touchStorage The SpyTouchStorage object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeTouchStorage(SpyTouchStorage $touchStorage)
    {
        if ($this->getTouchStorages()->contains($touchStorage)) {
            $pos = $this->collTouchStorages->search($touchStorage);
            $this->collTouchStorages->remove($pos);
            if (null === $this->touchStoragesScheduledForDeletion) {
                $this->touchStoragesScheduledForDeletion = clone $this->collTouchStorages;
                $this->touchStoragesScheduledForDeletion->clear();
            }
            $this->touchStoragesScheduledForDeletion[]= $touchStorage;
            $touchStorage->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related TouchStorages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyTouchStorage[] List of SpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchStorage}> List of SpyTouchStorage objects
     */
    public function getTouchStoragesJoinTouch(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyTouchStorageQuery::create(null, $criteria);
        $query->joinWith('Touch', $joinBehavior);

        return $this->getTouchStorages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related TouchStorages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyTouchStorage[] List of SpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchStorage}> List of SpyTouchStorage objects
     */
    public function getTouchStoragesJoinLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyTouchStorageQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getTouchStorages($query, $con);
    }

    /**
     * Clears out the collTouchSearches collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return $this
     * @see addTouchSearches()
     */
    public function clearTouchSearches()
    {
        $this->collTouchSearches = null; // important to set this to NULL since that means it is uninitialized

        return $this;
    }

    /**
     * Reset is the collTouchSearches collection loaded partially.
     *
     * @return void
     */
    public function resetPartialTouchSearches($v = true): void
    {
        $this->collTouchSearchesPartial = $v;
    }

    /**
     * Initializes the collTouchSearches collection.
     *
     * By default this just sets the collTouchSearches collection to an empty array (like clearcollTouchSearches());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param bool $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTouchSearches(bool $overrideExisting = true): void
    {
        if (null !== $this->collTouchSearches && !$overrideExisting) {
            return;
        }

        $collectionClassName = SpyTouchSearchTableMap::getTableMap()->getCollectionClassName();

        $this->collTouchSearches = new $collectionClassName;
        $this->collTouchSearches->setModel('\Orm\Zed\Touch\Persistence\SpyTouchSearch');
    }

    /**
     * Gets an array of SpyTouchSearch objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyStore is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|SpyTouchSearch[] List of SpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchSearch> List of SpyTouchSearch objects
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getTouchSearches(?Criteria $criteria = null, ?ConnectionInterface $con = null)
    {
        $partial = $this->collTouchSearchesPartial && !$this->isNew();
        if (null === $this->collTouchSearches || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTouchSearches) {
                    $this->initTouchSearches();
                } else {
                    $collectionClassName = SpyTouchSearchTableMap::getTableMap()->getCollectionClassName();

                    $collTouchSearches = new $collectionClassName;
                    $collTouchSearches->setModel('\Orm\Zed\Touch\Persistence\SpyTouchSearch');

                    return $collTouchSearches;
                }
            } else {
                $collTouchSearches = SpyTouchSearchQuery::create(null, $criteria)
                    ->filterByStore($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTouchSearchesPartial && count($collTouchSearches)) {
                        $this->initTouchSearches(false);

                        foreach ($collTouchSearches as $obj) {
                            if (false == $this->collTouchSearches->contains($obj)) {
                                $this->collTouchSearches->append($obj);
                            }
                        }

                        $this->collTouchSearchesPartial = true;
                    }

                    return $collTouchSearches;
                }

                if ($partial && $this->collTouchSearches) {
                    foreach ($this->collTouchSearches as $obj) {
                        if ($obj->isNew()) {
                            $collTouchSearches[] = $obj;
                        }
                    }
                }

                $this->collTouchSearches = $collTouchSearches;
                $this->collTouchSearchesPartial = false;
            }
        }

        return $this->collTouchSearches;
    }

    /**
     * Sets a collection of SpyTouchSearch objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param Collection $touchSearches A Propel collection.
     * @param ConnectionInterface $con Optional connection object
     * @return $this The current object (for fluent API support)
     */
    public function setTouchSearches(Collection $touchSearches, ?ConnectionInterface $con = null)
    {
        /** @var SpyTouchSearch[] $touchSearchesToDelete */
        $touchSearchesToDelete = $this->getTouchSearches(new Criteria(), $con)->diff($touchSearches);


        $this->touchSearchesScheduledForDeletion = $touchSearchesToDelete;

        foreach ($touchSearchesToDelete as $touchSearchRemoved) {
            $touchSearchRemoved->setStore(null);
        }

        $this->collTouchSearches = null;
        foreach ($touchSearches as $touchSearch) {
            $this->addTouchSearch($touchSearch);
        }

        $this->collTouchSearches = $touchSearches;
        $this->collTouchSearchesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseSpyTouchSearch objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related BaseSpyTouchSearch objects.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function countTouchSearches(?Criteria $criteria = null, bool $distinct = false, ?ConnectionInterface $con = null): int
    {
        $partial = $this->collTouchSearchesPartial && !$this->isNew();
        if (null === $this->collTouchSearches || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTouchSearches) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTouchSearches());
            }

            $query = SpyTouchSearchQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStore($this)
                ->count($con);
        }

        return count($this->collTouchSearches);
    }

    /**
     * Method called to associate a SpyTouchSearch object to this object
     * through the SpyTouchSearch foreign key attribute.
     *
     * @param SpyTouchSearch $l SpyTouchSearch
     * @return $this The current object (for fluent API support)
     */
    public function addTouchSearch(SpyTouchSearch $l)
    {
        if ($this->collTouchSearches === null) {
            $this->initTouchSearches();
            $this->collTouchSearchesPartial = true;
        }

        if (!$this->collTouchSearches->contains($l)) {
            $this->doAddTouchSearch($l);

            if ($this->touchSearchesScheduledForDeletion and $this->touchSearchesScheduledForDeletion->contains($l)) {
                $this->touchSearchesScheduledForDeletion->remove($this->touchSearchesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param SpyTouchSearch $touchSearch The SpyTouchSearch object to add.
     */
    protected function doAddTouchSearch(SpyTouchSearch $touchSearch): void
    {
        $this->collTouchSearches[]= $touchSearch;
        $touchSearch->setStore($this);
    }

    /**
     * @param SpyTouchSearch $touchSearch The SpyTouchSearch object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeTouchSearch(SpyTouchSearch $touchSearch)
    {
        if ($this->getTouchSearches()->contains($touchSearch)) {
            $pos = $this->collTouchSearches->search($touchSearch);
            $this->collTouchSearches->remove($pos);
            if (null === $this->touchSearchesScheduledForDeletion) {
                $this->touchSearchesScheduledForDeletion = clone $this->collTouchSearches;
                $this->touchSearchesScheduledForDeletion->clear();
            }
            $this->touchSearchesScheduledForDeletion[]= $touchSearch;
            $touchSearch->setStore(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related TouchSearches from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyTouchSearch[] List of SpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchSearch}> List of SpyTouchSearch objects
     */
    public function getTouchSearchesJoinTouch(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyTouchSearchQuery::create(null, $criteria);
        $query->joinWith('Touch', $joinBehavior);

        return $this->getTouchSearches($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyStore is new, it will return
     * an empty collection; or if this SpyStore has previously
     * been saved, it will retrieve related TouchSearches from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyStore.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyTouchSearch[] List of SpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<SpyTouchSearch}> List of SpyTouchSearch objects
     */
    public function getTouchSearchesJoinLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyTouchSearchQuery::create(null, $criteria);
        $query->joinWith('Locale', $joinBehavior);

        return $this->getTouchSearches($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     *
     * @return $this
     */
    public function clear()
    {
        if (null !== $this->aDefaultCurrency) {
            $this->aDefaultCurrency->removeStoreDefault($this);
        }
        if (null !== $this->aDefaultLocale) {
            $this->aDefaultLocale->removeStoreDefault($this);
        }
        $this->id_store = null;
        $this->fk_currency = null;
        $this->fk_locale = null;
        $this->name = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);

        return $this;
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param bool $deep Whether to also clear the references on all referrer objects.
     * @return $this
     */
    public function clearAllReferences(bool $deep = false)
    {
        if ($deep) {
            if ($this->collCurrencyStores) {
                foreach ($this->collCurrencyStores as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLocaleStores) {
                foreach ($this->collLocaleStores as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTouchStorages) {
                foreach ($this->collTouchStorages as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTouchSearches) {
                foreach ($this->collTouchSearches as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCurrencyStores = null;
        $this->collLocaleStores = null;
        $this->collTouchStorages = null;
        $this->collTouchSearches = null;
        $this->aDefaultCurrency = null;
        $this->aDefaultLocale = null;
        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyStoreTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preSave(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postSave(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before inserting to database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preInsert(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postInsert(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preUpdate(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postUpdate(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preDelete(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postDelete(?ConnectionInterface $con = null): void
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
