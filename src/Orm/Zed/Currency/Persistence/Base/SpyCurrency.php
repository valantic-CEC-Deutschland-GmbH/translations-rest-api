<?php

namespace Orm\Zed\Currency\Persistence\Base;

use \Exception;
use \PDO;
use Orm\Zed\Currency\Persistence\SpyCurrency as ChildSpyCurrency;
use Orm\Zed\Currency\Persistence\SpyCurrencyQuery as ChildSpyCurrencyQuery;
use Orm\Zed\Currency\Persistence\SpyCurrencyStore as ChildSpyCurrencyStore;
use Orm\Zed\Currency\Persistence\SpyCurrencyStoreQuery as ChildSpyCurrencyStoreQuery;
use Orm\Zed\Currency\Persistence\Map\SpyCurrencyStoreTableMap;
use Orm\Zed\Currency\Persistence\Map\SpyCurrencyTableMap;
use Orm\Zed\Store\Persistence\SpyStore;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Orm\Zed\Store\Persistence\Base\SpyStore as BaseSpyStore;
use Orm\Zed\Store\Persistence\Map\SpyStoreTableMap;
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
 * Base class that represents a row from the 'spy_currency' table.
 *
 *
 *
 * @package    propel.generator.Orm.Zed.Currency.Persistence.Base
 */
abstract class SpyCurrency implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Orm\\Zed\\Currency\\Persistence\\Map\\SpyCurrencyTableMap';


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
     * The value for the id_currency field.
     *
     * @var        int
     */
    protected $id_currency;

    /**
     * The value for the name field.
     *
     * @var        string|null
     */
    protected $name;

    /**
     * The value for the code field.
     *
     * @var        string|null
     */
    protected $code;

    /**
     * The value for the symbol field.
     *
     * @var        string|null
     */
    protected $symbol;

    /**
     * @var        ObjectCollection|ChildSpyCurrencyStore[] Collection to store aggregation of ChildSpyCurrencyStore objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyCurrencyStore> Collection to store aggregation of ChildSpyCurrencyStore objects.
     */
    protected $collCurrencyStores;
    protected $collCurrencyStoresPartial;

    /**
     * @var        ObjectCollection|SpyStore[] Collection to store aggregation of SpyStore objects.
     * @phpstan-var ObjectCollection&\Traversable<SpyStore> Collection to store aggregation of SpyStore objects.
     */
    protected $collStoreDefaults;
    protected $collStoreDefaultsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCurrencyStore[]
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyCurrencyStore>
     */
    protected $currencyStoresScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|SpyStore[]
     * @phpstan-var ObjectCollection&\Traversable<SpyStore>
     */
    protected $storeDefaultsScheduledForDeletion = null;

    /**
     * Initializes internal state of Orm\Zed\Currency\Persistence\Base\SpyCurrency object.
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
     * Compares this with another <code>SpyCurrency</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCurrency</code>, delegates to
     * <code>equals(SpyCurrency)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [id_currency] column value.
     *
     * @return int
     */
    public function getIdCurrency()
    {
        return $this->id_currency;
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
     * Get the [code] column value.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the [symbol] column value.
     *
     * @return string|null
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set the value of [id_currency] column.
     *
     * @param int $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setIdCurrency($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_currency !== $v) {
            $this->id_currency = $v;
            $this->modifiedColumns[SpyCurrencyTableMap::COL_ID_CURRENCY] = true;
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
            $this->modifiedColumns[SpyCurrencyTableMap::COL_NAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [code] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[SpyCurrencyTableMap::COL_CODE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [symbol] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSymbol($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->symbol !== $v) {
            $this->symbol = $v;
            $this->modifiedColumns[SpyCurrencyTableMap::COL_SYMBOL] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCurrencyTableMap::translateFieldName('IdCurrency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_currency = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCurrencyTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCurrencyTableMap::translateFieldName('Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCurrencyTableMap::translateFieldName('Symbol', TableMap::TYPE_PHPNAME, $indexType)];
            $this->symbol = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = SpyCurrencyTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Orm\\Zed\\Currency\\Persistence\\SpyCurrency'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyCurrencyTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCurrencyQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCurrencyStores = null;

            $this->collStoreDefaults = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param ConnectionInterface $con
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @see SpyCurrency::setDeleted()
     * @see SpyCurrency::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCurrencyTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCurrencyQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCurrencyTableMap::DATABASE_NAME);
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
                SpyCurrencyTableMap::addInstanceToPool($this);
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

            if ($this->storeDefaultsScheduledForDeletion !== null) {
                if (!$this->storeDefaultsScheduledForDeletion->isEmpty()) {
                    foreach ($this->storeDefaultsScheduledForDeletion as $storeDefault) {
                        // need to save related object because we set the relation to null
                        $storeDefault->save($con);
                    }
                    $this->storeDefaultsScheduledForDeletion = null;
                }
            }

            if ($this->collStoreDefaults !== null) {
                foreach ($this->collStoreDefaults as $referrerFK) {
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

        $this->modifiedColumns[SpyCurrencyTableMap::COL_ID_CURRENCY] = true;
        if (null !== $this->id_currency) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCurrencyTableMap::COL_ID_CURRENCY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_ID_CURRENCY)) {
            $modifiedColumns[':p' . $index++]  = 'id_currency';
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'code';
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_SYMBOL)) {
            $modifiedColumns[':p' . $index++]  = 'symbol';
        }

        $sql = sprintf(
            'INSERT INTO spy_currency (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_currency':
                        $stmt->bindValue($identifier, $this->id_currency, PDO::PARAM_INT);

                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);

                        break;
                    case 'code':
                        $stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);

                        break;
                    case 'symbol':
                        $stmt->bindValue($identifier, $this->symbol, PDO::PARAM_STR);

                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_currency_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCurrency($pk);

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
        $pos = SpyCurrencyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdCurrency();

            case 1:
                return $this->getName();

            case 2:
                return $this->getCode();

            case 3:
                return $this->getSymbol();

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
        if (isset($alreadyDumpedObjects['SpyCurrency'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['SpyCurrency'][$this->hashCode()] = true;
        $keys = SpyCurrencyTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getIdCurrency(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getCode(),
            $keys[3] => $this->getSymbol(),
        ];
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
            if (null !== $this->collStoreDefaults) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyStores';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_stores';
                        break;
                    default:
                        $key = 'StoreDefaults';
                }

                $result[$key] = $this->collStoreDefaults->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SpyCurrencyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setIdCurrency($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setCode($value);
                break;
            case 3:
                $this->setSymbol($value);
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
        $keys = SpyCurrencyTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCurrency($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSymbol($arr[$keys[3]]);
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
        $criteria = new Criteria(SpyCurrencyTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCurrencyTableMap::COL_ID_CURRENCY)) {
            $criteria->add(SpyCurrencyTableMap::COL_ID_CURRENCY, $this->id_currency);
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_NAME)) {
            $criteria->add(SpyCurrencyTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_CODE)) {
            $criteria->add(SpyCurrencyTableMap::COL_CODE, $this->code);
        }
        if ($this->isColumnModified(SpyCurrencyTableMap::COL_SYMBOL)) {
            $criteria->add(SpyCurrencyTableMap::COL_SYMBOL, $this->symbol);
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
        $criteria = ChildSpyCurrencyQuery::create();
        $criteria->add(SpyCurrencyTableMap::COL_ID_CURRENCY, $this->id_currency);

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
        $validPk = null !== $this->getIdCurrency();

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
        return $this->getIdCurrency();
    }

    /**
     * Generic method to set the primary key (id_currency column).
     *
     * @param int|null $key Primary key.
     * @return void
     */
    public function setPrimaryKey(?int $key = null): void
    {
        $this->setIdCurrency($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return null === $this->getIdCurrency();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Orm\Zed\Currency\Persistence\SpyCurrency (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setName($this->getName());
        $copyObj->setCode($this->getCode());
        $copyObj->setSymbol($this->getSymbol());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCurrencyStores() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCurrencyStore($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStoreDefaults() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStoreDefault($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCurrency(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Orm\Zed\Currency\Persistence\SpyCurrency Clone of current object.
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
        if ('StoreDefault' === $relationName) {
            $this->initStoreDefaults();
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
     * Gets an array of ChildSpyCurrencyStore objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCurrency is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCurrencyStore[] List of ChildSpyCurrencyStore objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyCurrencyStore> List of ChildSpyCurrencyStore objects
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
                $collCurrencyStores = ChildSpyCurrencyStoreQuery::create(null, $criteria)
                    ->filterByCurrency($this)
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
     * Sets a collection of ChildSpyCurrencyStore objects related by a one-to-many relationship
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
        /** @var ChildSpyCurrencyStore[] $currencyStoresToDelete */
        $currencyStoresToDelete = $this->getCurrencyStores(new Criteria(), $con)->diff($currencyStores);


        $this->currencyStoresScheduledForDeletion = $currencyStoresToDelete;

        foreach ($currencyStoresToDelete as $currencyStoreRemoved) {
            $currencyStoreRemoved->setCurrency(null);
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
     * Returns the number of related SpyCurrencyStore objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related SpyCurrencyStore objects.
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

            $query = ChildSpyCurrencyStoreQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCurrency($this)
                ->count($con);
        }

        return count($this->collCurrencyStores);
    }

    /**
     * Method called to associate a ChildSpyCurrencyStore object to this object
     * through the ChildSpyCurrencyStore foreign key attribute.
     *
     * @param ChildSpyCurrencyStore $l ChildSpyCurrencyStore
     * @return $this The current object (for fluent API support)
     */
    public function addCurrencyStore(ChildSpyCurrencyStore $l)
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
     * @param ChildSpyCurrencyStore $currencyStore The ChildSpyCurrencyStore object to add.
     */
    protected function doAddCurrencyStore(ChildSpyCurrencyStore $currencyStore): void
    {
        $this->collCurrencyStores[]= $currencyStore;
        $currencyStore->setCurrency($this);
    }

    /**
     * @param ChildSpyCurrencyStore $currencyStore The ChildSpyCurrencyStore object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeCurrencyStore(ChildSpyCurrencyStore $currencyStore)
    {
        if ($this->getCurrencyStores()->contains($currencyStore)) {
            $pos = $this->collCurrencyStores->search($currencyStore);
            $this->collCurrencyStores->remove($pos);
            if (null === $this->currencyStoresScheduledForDeletion) {
                $this->currencyStoresScheduledForDeletion = clone $this->collCurrencyStores;
                $this->currencyStoresScheduledForDeletion->clear();
            }
            $this->currencyStoresScheduledForDeletion[]= clone $currencyStore;
            $currencyStore->setCurrency(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCurrency is new, it will return
     * an empty collection; or if this SpyCurrency has previously
     * been saved, it will retrieve related CurrencyStores from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCurrency.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCurrencyStore[] List of ChildSpyCurrencyStore objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyCurrencyStore}> List of ChildSpyCurrencyStore objects
     */
    public function getCurrencyStoresJoinStore(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCurrencyStoreQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getCurrencyStores($query, $con);
    }

    /**
     * Clears out the collStoreDefaults collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return $this
     * @see addStoreDefaults()
     */
    public function clearStoreDefaults()
    {
        $this->collStoreDefaults = null; // important to set this to NULL since that means it is uninitialized

        return $this;
    }

    /**
     * Reset is the collStoreDefaults collection loaded partially.
     *
     * @return void
     */
    public function resetPartialStoreDefaults($v = true): void
    {
        $this->collStoreDefaultsPartial = $v;
    }

    /**
     * Initializes the collStoreDefaults collection.
     *
     * By default this just sets the collStoreDefaults collection to an empty array (like clearcollStoreDefaults());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param bool $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStoreDefaults(bool $overrideExisting = true): void
    {
        if (null !== $this->collStoreDefaults && !$overrideExisting) {
            return;
        }

        $collectionClassName = SpyStoreTableMap::getTableMap()->getCollectionClassName();

        $this->collStoreDefaults = new $collectionClassName;
        $this->collStoreDefaults->setModel('\Orm\Zed\Store\Persistence\SpyStore');
    }

    /**
     * Gets an array of SpyStore objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCurrency is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|SpyStore[] List of SpyStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyStore> List of SpyStore objects
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getStoreDefaults(?Criteria $criteria = null, ?ConnectionInterface $con = null)
    {
        $partial = $this->collStoreDefaultsPartial && !$this->isNew();
        if (null === $this->collStoreDefaults || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collStoreDefaults) {
                    $this->initStoreDefaults();
                } else {
                    $collectionClassName = SpyStoreTableMap::getTableMap()->getCollectionClassName();

                    $collStoreDefaults = new $collectionClassName;
                    $collStoreDefaults->setModel('\Orm\Zed\Store\Persistence\SpyStore');

                    return $collStoreDefaults;
                }
            } else {
                $collStoreDefaults = SpyStoreQuery::create(null, $criteria)
                    ->filterByDefaultCurrency($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collStoreDefaultsPartial && count($collStoreDefaults)) {
                        $this->initStoreDefaults(false);

                        foreach ($collStoreDefaults as $obj) {
                            if (false == $this->collStoreDefaults->contains($obj)) {
                                $this->collStoreDefaults->append($obj);
                            }
                        }

                        $this->collStoreDefaultsPartial = true;
                    }

                    return $collStoreDefaults;
                }

                if ($partial && $this->collStoreDefaults) {
                    foreach ($this->collStoreDefaults as $obj) {
                        if ($obj->isNew()) {
                            $collStoreDefaults[] = $obj;
                        }
                    }
                }

                $this->collStoreDefaults = $collStoreDefaults;
                $this->collStoreDefaultsPartial = false;
            }
        }

        return $this->collStoreDefaults;
    }

    /**
     * Sets a collection of SpyStore objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param Collection $storeDefaults A Propel collection.
     * @param ConnectionInterface $con Optional connection object
     * @return $this The current object (for fluent API support)
     */
    public function setStoreDefaults(Collection $storeDefaults, ?ConnectionInterface $con = null)
    {
        /** @var SpyStore[] $storeDefaultsToDelete */
        $storeDefaultsToDelete = $this->getStoreDefaults(new Criteria(), $con)->diff($storeDefaults);


        $this->storeDefaultsScheduledForDeletion = $storeDefaultsToDelete;

        foreach ($storeDefaultsToDelete as $storeDefaultRemoved) {
            $storeDefaultRemoved->setDefaultCurrency(null);
        }

        $this->collStoreDefaults = null;
        foreach ($storeDefaults as $storeDefault) {
            $this->addStoreDefault($storeDefault);
        }

        $this->collStoreDefaults = $storeDefaults;
        $this->collStoreDefaultsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseSpyStore objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related BaseSpyStore objects.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function countStoreDefaults(?Criteria $criteria = null, bool $distinct = false, ?ConnectionInterface $con = null): int
    {
        $partial = $this->collStoreDefaultsPartial && !$this->isNew();
        if (null === $this->collStoreDefaults || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStoreDefaults) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStoreDefaults());
            }

            $query = SpyStoreQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDefaultCurrency($this)
                ->count($con);
        }

        return count($this->collStoreDefaults);
    }

    /**
     * Method called to associate a SpyStore object to this object
     * through the SpyStore foreign key attribute.
     *
     * @param SpyStore $l SpyStore
     * @return $this The current object (for fluent API support)
     */
    public function addStoreDefault(SpyStore $l)
    {
        if ($this->collStoreDefaults === null) {
            $this->initStoreDefaults();
            $this->collStoreDefaultsPartial = true;
        }

        if (!$this->collStoreDefaults->contains($l)) {
            $this->doAddStoreDefault($l);

            if ($this->storeDefaultsScheduledForDeletion and $this->storeDefaultsScheduledForDeletion->contains($l)) {
                $this->storeDefaultsScheduledForDeletion->remove($this->storeDefaultsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param SpyStore $storeDefault The SpyStore object to add.
     */
    protected function doAddStoreDefault(SpyStore $storeDefault): void
    {
        $this->collStoreDefaults[]= $storeDefault;
        $storeDefault->setDefaultCurrency($this);
    }

    /**
     * @param SpyStore $storeDefault The SpyStore object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeStoreDefault(SpyStore $storeDefault)
    {
        if ($this->getStoreDefaults()->contains($storeDefault)) {
            $pos = $this->collStoreDefaults->search($storeDefault);
            $this->collStoreDefaults->remove($pos);
            if (null === $this->storeDefaultsScheduledForDeletion) {
                $this->storeDefaultsScheduledForDeletion = clone $this->collStoreDefaults;
                $this->storeDefaultsScheduledForDeletion->clear();
            }
            $this->storeDefaultsScheduledForDeletion[]= $storeDefault;
            $storeDefault->setDefaultCurrency(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCurrency is new, it will return
     * an empty collection; or if this SpyCurrency has previously
     * been saved, it will retrieve related StoreDefaults from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCurrency.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|SpyStore[] List of SpyStore objects
     * @phpstan-return ObjectCollection&\Traversable<SpyStore}> List of SpyStore objects
     */
    public function getStoreDefaultsJoinDefaultLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = SpyStoreQuery::create(null, $criteria);
        $query->joinWith('DefaultLocale', $joinBehavior);

        return $this->getStoreDefaults($query, $con);
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
        $this->id_currency = null;
        $this->name = null;
        $this->code = null;
        $this->symbol = null;
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
            if ($this->collStoreDefaults) {
                foreach ($this->collStoreDefaults as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCurrencyStores = null;
        $this->collStoreDefaults = null;
        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCurrencyTableMap::DEFAULT_STRING_FORMAT);
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
