<?php

namespace Orm\Zed\Touch\Persistence\Base;

use \DateTime;
use \Exception;
use \PDO;
use Orm\Zed\Touch\Persistence\SpyTouch as ChildSpyTouch;
use Orm\Zed\Touch\Persistence\SpyTouchQuery as ChildSpyTouchQuery;
use Orm\Zed\Touch\Persistence\SpyTouchSearch as ChildSpyTouchSearch;
use Orm\Zed\Touch\Persistence\SpyTouchSearchQuery as ChildSpyTouchSearchQuery;
use Orm\Zed\Touch\Persistence\SpyTouchStorage as ChildSpyTouchStorage;
use Orm\Zed\Touch\Persistence\SpyTouchStorageQuery as ChildSpyTouchStorageQuery;
use Orm\Zed\Touch\Persistence\Map\SpyTouchSearchTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchStorageTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_touch' table.
 *
 *
 *
 * @package    propel.generator.Orm.Zed.Touch.Persistence.Base
 */
abstract class SpyTouch implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Orm\\Zed\\Touch\\Persistence\\Map\\SpyTouchTableMap';


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
     * The value for the id_touch field.
     *
     * @var        int
     */
    protected $id_touch;

    /**
     * The value for the item_type field.
     *
     * @var        string
     */
    protected $item_type;

    /**
     * The value for the item_event field.
     *
     * @var        int
     */
    protected $item_event;

    /**
     * The value for the item_id field.
     *
     * @var        int
     */
    protected $item_id;

    /**
     * The value for the touched field.
     *
     * @var        DateTime
     */
    protected $touched;

    /**
     * @var        ObjectCollection|ChildSpyTouchStorage[] Collection to store aggregation of ChildSpyTouchStorage objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyTouchStorage> Collection to store aggregation of ChildSpyTouchStorage objects.
     */
    protected $collTouchStorages;
    protected $collTouchStoragesPartial;

    /**
     * @var        ObjectCollection|ChildSpyTouchSearch[] Collection to store aggregation of ChildSpyTouchSearch objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyTouchSearch> Collection to store aggregation of ChildSpyTouchSearch objects.
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
     * @var ObjectCollection|ChildSpyTouchStorage[]
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyTouchStorage>
     */
    protected $touchStoragesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyTouchSearch[]
     * @phpstan-var ObjectCollection&\Traversable<ChildSpyTouchSearch>
     */
    protected $touchSearchesScheduledForDeletion = null;

    /**
     * Initializes internal state of Orm\Zed\Touch\Persistence\Base\SpyTouch object.
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
     * Compares this with another <code>SpyTouch</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyTouch</code>, delegates to
     * <code>equals(SpyTouch)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [id_touch] column value.
     *
     * @return int
     */
    public function getIdTouch()
    {
        return $this->id_touch;
    }

    /**
     * Get the [item_type] column value.
     *
     * @return string
     */
    public function getItemType()
    {
        return $this->item_type;
    }

    /**
     * Get the [item_event] column value.
     *
     * @return string|null
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getItemEvent()
    {
        if (null === $this->item_event) {
            return null;
        }
        $valueSet = SpyTouchTableMap::getValueSet(SpyTouchTableMap::COL_ITEM_EVENT);
        if (!isset($valueSet[$this->item_event])) {
            throw new PropelException('Unknown stored enum key: ' . $this->item_event);
        }

        return $valueSet[$this->item_event];
    }

    /**
     * Get the [item_id] column value.
     *
     * @return int
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Get the [optionally formatted] temporal [touched] column value.
     *
     *
     * @param string|null $format The date/time format string (either date()-style or strftime()-style).
     *   If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL).
     *
     * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
     *
     * @psalm-return ($format is null ? DateTime : string)
     */
    public function getTouched($format = null)
    {
        if ($format === null) {
            return $this->touched;
        } else {
            return $this->touched instanceof \DateTimeInterface ? $this->touched->format($format) : null;
        }
    }

    /**
     * Set the value of [id_touch] column.
     *
     * @param int $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setIdTouch($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_touch !== $v) {
            $this->id_touch = $v;
            $this->modifiedColumns[SpyTouchTableMap::COL_ID_TOUCH] = true;
        }

        return $this;
    }

    /**
     * Set the value of [item_type] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->item_type !== $v) {
            $this->item_type = $v;
            $this->modifiedColumns[SpyTouchTableMap::COL_ITEM_TYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [item_event] column.
     *
     * @param string $v new value
     * @return $this The current object (for fluent API support)
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function setItemEvent($v)
    {
        if ($v !== null) {
            $valueSet = SpyTouchTableMap::getValueSet(SpyTouchTableMap::COL_ITEM_EVENT);
            if (!in_array($v, $valueSet)) {
                throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $v));
            }
            $v = array_search($v, $valueSet);
        }

        if ($this->item_event !== $v) {
            $this->item_event = $v;
            $this->modifiedColumns[SpyTouchTableMap::COL_ITEM_EVENT] = true;
        }

        return $this;
    }

    /**
     * Set the value of [item_id] column.
     *
     * @param int $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->item_id !== $v) {
            $this->item_id = $v;
            $this->modifiedColumns[SpyTouchTableMap::COL_ITEM_ID] = true;
        }

        return $this;
    }

    /**
     * Sets the value of [touched] column to a normalized version of the date/time value specified.
     *
     * @param string|integer|\DateTimeInterface $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this The current object (for fluent API support)
     */
    public function setTouched($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->touched !== null || $dt !== null) {
            if ($this->touched === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->touched->format("Y-m-d H:i:s.u")) {
                $this->touched = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyTouchTableMap::COL_TOUCHED] = true;
            }
        } // if either are not null

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyTouchTableMap::translateFieldName('IdTouch', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_touch = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyTouchTableMap::translateFieldName('ItemType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->item_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyTouchTableMap::translateFieldName('ItemEvent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->item_event = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyTouchTableMap::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->item_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyTouchTableMap::translateFieldName('Touched', TableMap::TYPE_PHPNAME, $indexType)];
            $this->touched = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = SpyTouchTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Orm\\Zed\\Touch\\Persistence\\SpyTouch'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyTouchQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
     * @see SpyTouch::setDeleted()
     * @see SpyTouch::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyTouchQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
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
                SpyTouchTableMap::addInstanceToPool($this);
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

            if ($this->touchStoragesScheduledForDeletion !== null) {
                if (!$this->touchStoragesScheduledForDeletion->isEmpty()) {
                    \Orm\Zed\Touch\Persistence\SpyTouchStorageQuery::create()
                        ->filterByPrimaryKeys($this->touchStoragesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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
                    \Orm\Zed\Touch\Persistence\SpyTouchSearchQuery::create()
                        ->filterByPrimaryKeys($this->touchSearchesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

        $this->modifiedColumns[SpyTouchTableMap::COL_ID_TOUCH] = true;
        if (null !== $this->id_touch) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyTouchTableMap::COL_ID_TOUCH . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyTouchTableMap::COL_ID_TOUCH)) {
            $modifiedColumns[':p' . $index++]  = '[id_touch]';
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '[item_type]';
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_EVENT)) {
            $modifiedColumns[':p' . $index++]  = '[item_event]';
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_ID)) {
            $modifiedColumns[':p' . $index++]  = '[item_id]';
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_TOUCHED)) {
            $modifiedColumns[':p' . $index++]  = '[touched]';
        }

        $sql = sprintf(
            'INSERT INTO [spy_touch] (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '[id_touch]':
                        $stmt->bindValue($identifier, $this->id_touch, PDO::PARAM_INT);

                        break;
                    case '[item_type]':
                        $stmt->bindValue($identifier, $this->item_type, PDO::PARAM_STR);

                        break;
                    case '[item_event]':
                        $stmt->bindValue($identifier, $this->item_event, PDO::PARAM_INT);

                        break;
                    case '[item_id]':
                        $stmt->bindValue($identifier, $this->item_id, PDO::PARAM_INT);

                        break;
                    case '[touched]':
                        $stmt->bindValue($identifier, $this->touched ? $this->touched->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);

                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_touch_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdTouch($pk);

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
        $pos = SpyTouchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdTouch();

            case 1:
                return $this->getItemType();

            case 2:
                return $this->getItemEvent();

            case 3:
                return $this->getItemId();

            case 4:
                return $this->getTouched();

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
        if (isset($alreadyDumpedObjects['SpyTouch'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['SpyTouch'][$this->hashCode()] = true;
        $keys = SpyTouchTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getIdTouch(),
            $keys[1] => $this->getItemType(),
            $keys[2] => $this->getItemEvent(),
            $keys[3] => $this->getItemId(),
            $keys[4] => $this->getTouched(),
        ];
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('Y-m-d H:i:s.u');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
        $pos = SpyTouchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setIdTouch($value);
                break;
            case 1:
                $this->setItemType($value);
                break;
            case 2:
                $valueSet = SpyTouchTableMap::getValueSet(SpyTouchTableMap::COL_ITEM_EVENT);
                if (isset($valueSet[$value])) {
                    $value = $valueSet[$value];
                }
                $this->setItemEvent($value);
                break;
            case 3:
                $this->setItemId($value);
                break;
            case 4:
                $this->setTouched($value);
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
        $keys = SpyTouchTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdTouch($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setItemType($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setItemEvent($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setItemId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTouched($arr[$keys[4]]);
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
        $criteria = new Criteria(SpyTouchTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyTouchTableMap::COL_ID_TOUCH)) {
            $criteria->add(SpyTouchTableMap::COL_ID_TOUCH, $this->id_touch);
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_TYPE)) {
            $criteria->add(SpyTouchTableMap::COL_ITEM_TYPE, $this->item_type);
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_EVENT)) {
            $criteria->add(SpyTouchTableMap::COL_ITEM_EVENT, $this->item_event);
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_ITEM_ID)) {
            $criteria->add(SpyTouchTableMap::COL_ITEM_ID, $this->item_id);
        }
        if ($this->isColumnModified(SpyTouchTableMap::COL_TOUCHED)) {
            $criteria->add(SpyTouchTableMap::COL_TOUCHED, $this->touched);
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
        $criteria = ChildSpyTouchQuery::create();
        $criteria->add(SpyTouchTableMap::COL_ID_TOUCH, $this->id_touch);

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
        $validPk = null !== $this->getIdTouch();

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
        return $this->getIdTouch();
    }

    /**
     * Generic method to set the primary key (id_touch column).
     *
     * @param int|null $key Primary key.
     * @return void
     */
    public function setPrimaryKey(?int $key = null): void
    {
        $this->setIdTouch($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return null === $this->getIdTouch();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Orm\Zed\Touch\Persistence\SpyTouch (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setItemType($this->getItemType());
        $copyObj->setItemEvent($this->getItemEvent());
        $copyObj->setItemId($this->getItemId());
        $copyObj->setTouched($this->getTouched());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

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
            $copyObj->setIdTouch(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Orm\Zed\Touch\Persistence\SpyTouch Clone of current object.
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
     * Gets an array of ChildSpyTouchStorage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyTouch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTouchStorage[] List of ChildSpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchStorage> List of ChildSpyTouchStorage objects
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
                $collTouchStorages = ChildSpyTouchStorageQuery::create(null, $criteria)
                    ->filterByTouch($this)
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
     * Sets a collection of ChildSpyTouchStorage objects related by a one-to-many relationship
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
        /** @var ChildSpyTouchStorage[] $touchStoragesToDelete */
        $touchStoragesToDelete = $this->getTouchStorages(new Criteria(), $con)->diff($touchStorages);


        $this->touchStoragesScheduledForDeletion = $touchStoragesToDelete;

        foreach ($touchStoragesToDelete as $touchStorageRemoved) {
            $touchStorageRemoved->setTouch(null);
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
     * Returns the number of related SpyTouchStorage objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related SpyTouchStorage objects.
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

            $query = ChildSpyTouchStorageQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTouch($this)
                ->count($con);
        }

        return count($this->collTouchStorages);
    }

    /**
     * Method called to associate a ChildSpyTouchStorage object to this object
     * through the ChildSpyTouchStorage foreign key attribute.
     *
     * @param ChildSpyTouchStorage $l ChildSpyTouchStorage
     * @return $this The current object (for fluent API support)
     */
    public function addTouchStorage(ChildSpyTouchStorage $l)
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
     * @param ChildSpyTouchStorage $touchStorage The ChildSpyTouchStorage object to add.
     */
    protected function doAddTouchStorage(ChildSpyTouchStorage $touchStorage): void
    {
        $this->collTouchStorages[]= $touchStorage;
        $touchStorage->setTouch($this);
    }

    /**
     * @param ChildSpyTouchStorage $touchStorage The ChildSpyTouchStorage object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeTouchStorage(ChildSpyTouchStorage $touchStorage)
    {
        if ($this->getTouchStorages()->contains($touchStorage)) {
            $pos = $this->collTouchStorages->search($touchStorage);
            $this->collTouchStorages->remove($pos);
            if (null === $this->touchStoragesScheduledForDeletion) {
                $this->touchStoragesScheduledForDeletion = clone $this->collTouchStorages;
                $this->touchStoragesScheduledForDeletion->clear();
            }
            $this->touchStoragesScheduledForDeletion[]= clone $touchStorage;
            $touchStorage->setTouch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyTouch is new, it will return
     * an empty collection; or if this SpyTouch has previously
     * been saved, it will retrieve related TouchStorages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyTouch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchStorage[] List of ChildSpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchStorage}> List of ChildSpyTouchStorage objects
     */
    public function getTouchStoragesJoinStore(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchStorageQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getTouchStorages($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyTouch is new, it will return
     * an empty collection; or if this SpyTouch has previously
     * been saved, it will retrieve related TouchStorages from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyTouch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchStorage[] List of ChildSpyTouchStorage objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchStorage}> List of ChildSpyTouchStorage objects
     */
    public function getTouchStoragesJoinLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchStorageQuery::create(null, $criteria);
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
     * Gets an array of ChildSpyTouchSearch objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyTouch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyTouchSearch[] List of ChildSpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchSearch> List of ChildSpyTouchSearch objects
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
                $collTouchSearches = ChildSpyTouchSearchQuery::create(null, $criteria)
                    ->filterByTouch($this)
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
     * Sets a collection of ChildSpyTouchSearch objects related by a one-to-many relationship
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
        /** @var ChildSpyTouchSearch[] $touchSearchesToDelete */
        $touchSearchesToDelete = $this->getTouchSearches(new Criteria(), $con)->diff($touchSearches);


        $this->touchSearchesScheduledForDeletion = $touchSearchesToDelete;

        foreach ($touchSearchesToDelete as $touchSearchRemoved) {
            $touchSearchRemoved->setTouch(null);
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
     * Returns the number of related SpyTouchSearch objects.
     *
     * @param Criteria $criteria
     * @param bool $distinct
     * @param ConnectionInterface $con
     * @return int Count of related SpyTouchSearch objects.
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

            $query = ChildSpyTouchSearchQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTouch($this)
                ->count($con);
        }

        return count($this->collTouchSearches);
    }

    /**
     * Method called to associate a ChildSpyTouchSearch object to this object
     * through the ChildSpyTouchSearch foreign key attribute.
     *
     * @param ChildSpyTouchSearch $l ChildSpyTouchSearch
     * @return $this The current object (for fluent API support)
     */
    public function addTouchSearch(ChildSpyTouchSearch $l)
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
     * @param ChildSpyTouchSearch $touchSearch The ChildSpyTouchSearch object to add.
     */
    protected function doAddTouchSearch(ChildSpyTouchSearch $touchSearch): void
    {
        $this->collTouchSearches[]= $touchSearch;
        $touchSearch->setTouch($this);
    }

    /**
     * @param ChildSpyTouchSearch $touchSearch The ChildSpyTouchSearch object to remove.
     * @return $this The current object (for fluent API support)
     */
    public function removeTouchSearch(ChildSpyTouchSearch $touchSearch)
    {
        if ($this->getTouchSearches()->contains($touchSearch)) {
            $pos = $this->collTouchSearches->search($touchSearch);
            $this->collTouchSearches->remove($pos);
            if (null === $this->touchSearchesScheduledForDeletion) {
                $this->touchSearchesScheduledForDeletion = clone $this->collTouchSearches;
                $this->touchSearchesScheduledForDeletion->clear();
            }
            $this->touchSearchesScheduledForDeletion[]= clone $touchSearch;
            $touchSearch->setTouch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyTouch is new, it will return
     * an empty collection; or if this SpyTouch has previously
     * been saved, it will retrieve related TouchSearches from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyTouch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchSearch[] List of ChildSpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchSearch}> List of ChildSpyTouchSearch objects
     */
    public function getTouchSearchesJoinStore(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchSearchQuery::create(null, $criteria);
        $query->joinWith('Store', $joinBehavior);

        return $this->getTouchSearches($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyTouch is new, it will return
     * an empty collection; or if this SpyTouch has previously
     * been saved, it will retrieve related TouchSearches from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyTouch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param ConnectionInterface $con optional connection object
     * @param string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyTouchSearch[] List of ChildSpyTouchSearch objects
     * @phpstan-return ObjectCollection&\Traversable<ChildSpyTouchSearch}> List of ChildSpyTouchSearch objects
     */
    public function getTouchSearchesJoinLocale(?Criteria $criteria = null, ?ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyTouchSearchQuery::create(null, $criteria);
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
        $this->id_touch = null;
        $this->item_type = null;
        $this->item_event = null;
        $this->item_id = null;
        $this->touched = null;
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

        $this->collTouchStorages = null;
        $this->collTouchSearches = null;
        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyTouchTableMap::DEFAULT_STRING_FORMAT);
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
