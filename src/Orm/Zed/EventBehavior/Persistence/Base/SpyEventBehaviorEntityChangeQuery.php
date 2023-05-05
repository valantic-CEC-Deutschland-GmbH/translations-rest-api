<?php

namespace Orm\Zed\EventBehavior\Persistence\Base;

use \Exception;
use \PDO;
use Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChange as ChildSpyEventBehaviorEntityChange;
use Orm\Zed\EventBehavior\Persistence\SpyEventBehaviorEntityChangeQuery as ChildSpyEventBehaviorEntityChangeQuery;
use Orm\Zed\EventBehavior\Persistence\Map\SpyEventBehaviorEntityChangeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria as SprykerCriteria;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * Base class that represents a query for the `spy_event_behavior_entity_change` table.
 *
 * @method     ChildSpyEventBehaviorEntityChangeQuery orderByIdEventBehaviorEntityChange($order = Criteria::ASC) Order by the id_event_behavior_entity_change column
 * @method     ChildSpyEventBehaviorEntityChangeQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildSpyEventBehaviorEntityChangeQuery orderByProcessId($order = Criteria::ASC) Order by the process_id column
 * @method     ChildSpyEventBehaviorEntityChangeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildSpyEventBehaviorEntityChangeQuery groupByIdEventBehaviorEntityChange() Group by the id_event_behavior_entity_change column
 * @method     ChildSpyEventBehaviorEntityChangeQuery groupByData() Group by the data column
 * @method     ChildSpyEventBehaviorEntityChangeQuery groupByProcessId() Group by the process_id column
 * @method     ChildSpyEventBehaviorEntityChangeQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildSpyEventBehaviorEntityChangeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyEventBehaviorEntityChangeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyEventBehaviorEntityChangeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyEventBehaviorEntityChangeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSpyEventBehaviorEntityChangeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSpyEventBehaviorEntityChangeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSpyEventBehaviorEntityChange|null findOne(?ConnectionInterface $con = null) Return the first ChildSpyEventBehaviorEntityChange matching the query
 * @method     ChildSpyEventBehaviorEntityChange findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSpyEventBehaviorEntityChange matching the query, or a new ChildSpyEventBehaviorEntityChange object populated from the query conditions when no match is found
 *
 * @method     ChildSpyEventBehaviorEntityChange|null findOneByIdEventBehaviorEntityChange(string $id_event_behavior_entity_change) Return the first ChildSpyEventBehaviorEntityChange filtered by the id_event_behavior_entity_change column
 * @method     ChildSpyEventBehaviorEntityChange|null findOneByData(string $data) Return the first ChildSpyEventBehaviorEntityChange filtered by the data column
 * @method     ChildSpyEventBehaviorEntityChange|null findOneByProcessId(string $process_id) Return the first ChildSpyEventBehaviorEntityChange filtered by the process_id column
 * @method     ChildSpyEventBehaviorEntityChange|null findOneByCreatedAt(string $created_at) Return the first ChildSpyEventBehaviorEntityChange filtered by the created_at column
 *
 * @method     ChildSpyEventBehaviorEntityChange requirePk($key, ?ConnectionInterface $con = null) Return the ChildSpyEventBehaviorEntityChange by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyEventBehaviorEntityChange requireOne(?ConnectionInterface $con = null) Return the first ChildSpyEventBehaviorEntityChange matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyEventBehaviorEntityChange requireOneByIdEventBehaviorEntityChange(string $id_event_behavior_entity_change) Return the first ChildSpyEventBehaviorEntityChange filtered by the id_event_behavior_entity_change column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyEventBehaviorEntityChange requireOneByData(string $data) Return the first ChildSpyEventBehaviorEntityChange filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyEventBehaviorEntityChange requireOneByProcessId(string $process_id) Return the first ChildSpyEventBehaviorEntityChange filtered by the process_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyEventBehaviorEntityChange requireOneByCreatedAt(string $created_at) Return the first ChildSpyEventBehaviorEntityChange filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyEventBehaviorEntityChange[]|Collection find(?ConnectionInterface $con = null) Return ChildSpyEventBehaviorEntityChange objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSpyEventBehaviorEntityChange> find(?ConnectionInterface $con = null) Return ChildSpyEventBehaviorEntityChange objects based on current ModelCriteria
 *
 * @method     ChildSpyEventBehaviorEntityChange[]|Collection findByIdEventBehaviorEntityChange(string|array<string> $id_event_behavior_entity_change) Return ChildSpyEventBehaviorEntityChange objects filtered by the id_event_behavior_entity_change column
 * @psalm-method Collection&\Traversable<ChildSpyEventBehaviorEntityChange> findByIdEventBehaviorEntityChange(string|array<string> $id_event_behavior_entity_change) Return ChildSpyEventBehaviorEntityChange objects filtered by the id_event_behavior_entity_change column
 * @method     ChildSpyEventBehaviorEntityChange[]|Collection findByData(string|array<string> $data) Return ChildSpyEventBehaviorEntityChange objects filtered by the data column
 * @psalm-method Collection&\Traversable<ChildSpyEventBehaviorEntityChange> findByData(string|array<string> $data) Return ChildSpyEventBehaviorEntityChange objects filtered by the data column
 * @method     ChildSpyEventBehaviorEntityChange[]|Collection findByProcessId(string|array<string> $process_id) Return ChildSpyEventBehaviorEntityChange objects filtered by the process_id column
 * @psalm-method Collection&\Traversable<ChildSpyEventBehaviorEntityChange> findByProcessId(string|array<string> $process_id) Return ChildSpyEventBehaviorEntityChange objects filtered by the process_id column
 * @method     ChildSpyEventBehaviorEntityChange[]|Collection findByCreatedAt(string|array<string> $created_at) Return ChildSpyEventBehaviorEntityChange objects filtered by the created_at column
 * @psalm-method Collection&\Traversable<ChildSpyEventBehaviorEntityChange> findByCreatedAt(string|array<string> $created_at) Return ChildSpyEventBehaviorEntityChange objects filtered by the created_at column
 *
 * @method     ChildSpyEventBehaviorEntityChange[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSpyEventBehaviorEntityChange> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SpyEventBehaviorEntityChangeQuery extends ModelCriteria
{

    /**
     * @var bool
     */
    protected $isForUpdateEnabled = false;

    /**
     * @deprecated Use {@link \Propel\Runtime\ActiveQuery\Criteria::lockForUpdate()} instead.
     *
     * @param bool $isForUpdateEnabled
     *
     * @return $this The primary criteria object
     */
    public function forUpdate($isForUpdateEnabled)
    {
        $this->isForUpdateEnabled = $isForUpdateEnabled;

        return $this;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function createSelectSql(&$params): string
    {
        $sql = parent::createSelectSql($params);
        if ($this->isForUpdateEnabled) {
            $sql .= ' FOR UPDATE';
        }

        return $sql;
    }

    /**
     * Clear the conditions to allow the reuse of the query object.
     * The ModelCriteria's Model and alias 'all the properties set by construct) will remain.
     *
     * @return $this The primary criteria object
     */
    public function clear()
    {
        parent::clear();

        $this->isSelfSelected = false;
        $this->forUpdate(false);

        return $this;
    }


    /**
     * @param int $affectedRows
     * @param \Propel\Runtime\Connection\ConnectionInterface $con
     *
     * @return int|null
     */
    protected function postUpdate(int $affectedRows, ConnectionInterface $con): ?int
    {
        return null;
    }

    /**
     * @param int $affectedRows
     * @param \Propel\Runtime\Connection\ConnectionInterface $con
     *
     * @return int|null
     */
    protected function postDelete(int $affectedRows, ConnectionInterface $con): ?int
    {
        return null;
    }

    /**
     * Issue a SELECT query based on the current ModelCriteria
     * and format the list of results with the current formatter
     * By default, returns an array of model objects
     *
     * @param \Propel\Runtime\Connection\ConnectionInterface|null $con an optional connection object
     *
     * @return \Propel\Runtime\Collection\ObjectCollection|\Propel\Runtime\ActiveRecord\ActiveRecordInterface[]|mixed the list of results, formatted by the current formatter
     */
    public function find(?ConnectionInterface $con = null)
    {
        return parent::find($con);
    }

    /**
     * Issue a SELECT ... LIMIT 1 query based on the current ModelCriteria
     * and format the result with the current formatter
     * By default, returns a model object.
     *
     * Does not work with ->with()s containing one-to-many relations.
     *
     * @param \Propel\Runtime\Connection\ConnectionInterface|null $con an optional connection object
     *
     * @return mixed the result, formatted by the current formatter
     */
    public function findOne(?ConnectionInterface $con = null)
    {
        return parent::findOne($con);
    }

    /**
     * Issue an existence check on the current ModelCriteria
     *
     * @param \Propel\Runtime\Connection\ConnectionInterface|null $con an optional connection object
     *
     * @return bool column existence
     */
    public function exists(?ConnectionInterface $con = null): bool
    {
        return parent::exists($con);
    }
        protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Orm\Zed\EventBehavior\Persistence\Base\SpyEventBehaviorEntityChangeQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Orm\\Zed\\EventBehavior\\Persistence\\SpyEventBehaviorEntityChange', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyEventBehaviorEntityChangeQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyEventBehaviorEntityChangeQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSpyEventBehaviorEntityChangeQuery) {
            return $criteria;
        }
        $query = new ChildSpyEventBehaviorEntityChangeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyEventBehaviorEntityChange|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SpyEventBehaviorEntityChangeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyEventBehaviorEntityChange A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT [id_event_behavior_entity_change], [data], [process_id], [created_at] FROM [spy_event_behavior_entity_change] WHERE [id_event_behavior_entity_change] = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyEventBehaviorEntityChange $obj */
            $obj = new ChildSpyEventBehaviorEntityChange();
            $obj->hydrate($row);
            SpyEventBehaviorEntityChangeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildSpyEventBehaviorEntityChange|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return    Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }

        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $idEventBehaviorEntityChange Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdEventBehaviorEntityChange_Between(array $idEventBehaviorEntityChange)
    {
        return $this->filterByIdEventBehaviorEntityChange($idEventBehaviorEntityChange, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $idEventBehaviorEntityChanges Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdEventBehaviorEntityChange_In(array $idEventBehaviorEntityChanges)
    {
        return $this->filterByIdEventBehaviorEntityChange($idEventBehaviorEntityChanges, Criteria::IN);
    }

    /**
     * Filter the query on the id_event_behavior_entity_change column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEventBehaviorEntityChange(1234); // WHERE id_event_behavior_entity_change = 1234
     * $query->filterByIdEventBehaviorEntityChange(array(12, 34), Criteria::IN); // WHERE id_event_behavior_entity_change IN (12, 34)
     * $query->filterByIdEventBehaviorEntityChange(array('min' => 12), SprykerCriteria::BETWEEN); // WHERE id_event_behavior_entity_change > 12
     * </code>
     *
     * @param     mixed $idEventBehaviorEntityChange The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByIdEventBehaviorEntityChange($idEventBehaviorEntityChange = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($idEventBehaviorEntityChange)) {
            $useMinMax = false;
            if (isset($idEventBehaviorEntityChange['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $idEventBehaviorEntityChange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEventBehaviorEntityChange['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $idEventBehaviorEntityChange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$idEventBehaviorEntityChange of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $idEventBehaviorEntityChange, $comparison);

        return $query;
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $datas Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByData_In(array $datas)
    {
        return $this->filterByData($datas, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::LIKE filtering criteria for the column.
     *
     * @param string $data Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByData_Like($data)
    {
        return $this->filterByData($data, Criteria::LIKE);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * $query->filterByData([1, 'foo'], Criteria::IN); // WHERE data IN (1, 'foo')
     * </code>
     *
     * @param     string|string[] $data The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE). Add Criteria::LIKE explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByData($data = null, $comparison = Criteria::EQUAL)
    {
        if ($comparison == Criteria::LIKE || $comparison == Criteria::ILIKE) {
            $data = str_replace('*', '%', $data);
        }

        if (is_array($data) && !in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
            throw new AmbiguousComparisonException('$data of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
        }

        $query = $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_DATA, $data, $comparison);

        return $query;
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $processIds Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProcessId_In(array $processIds)
    {
        return $this->filterByProcessId($processIds, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::LIKE filtering criteria for the column.
     *
     * @param string $processId Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProcessId_Like($processId)
    {
        return $this->filterByProcessId($processId, Criteria::LIKE);
    }

    /**
     * Filter the query on the process_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessId('fooValue');   // WHERE process_id = 'fooValue'
     * $query->filterByProcessId('%fooValue%', Criteria::LIKE); // WHERE process_id LIKE '%fooValue%'
     * $query->filterByProcessId([1, 'foo'], Criteria::IN); // WHERE process_id IN (1, 'foo')
     * </code>
     *
     * @param     string|string[] $processId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE). Add Criteria::LIKE explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByProcessId($processId = null, $comparison = Criteria::EQUAL)
    {
        if ($comparison == Criteria::LIKE || $comparison == Criteria::ILIKE) {
            $processId = str_replace('*', '%', $processId);
        }

        if (is_array($processId) && !in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
            throw new AmbiguousComparisonException('$processId of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
        }

        $query = $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_PROCESS_ID, $processId, $comparison);

        return $query;
    }

    /**
     * Applies SprykerCriteria::BETWEEN filtering criteria for the column.
     *
     * @param array $createdAt Filter value.
     * [
     *    'min' => 3, 'max' => 5
     * ]
     *
     * 'min' and 'max' are optional, when neither is specified, throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreatedAt_Between(array $createdAt)
    {
        return $this->filterByCreatedAt($createdAt, SprykerCriteria::BETWEEN);
    }

    /**
     * Applies Criteria::IN filtering criteria for the column.
     *
     * @param array $createdAts Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreatedAt_In(array $createdAts)
    {
        return $this->filterByCreatedAt($createdAts, Criteria::IN);
    }

    /**
     * Applies SprykerCriteria::LIKE filtering criteria for the column.
     *
     * @param string $createdAt Filter value.
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreatedAt_Like($createdAt)
    {
        return $this->filterByCreatedAt($createdAt, Criteria::LIKE);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday'), SprykerCriteria::BETWEEN); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent. Add Criteria::IN explicitly.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals. Add SprykerCriteria::BETWEEN explicitly.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function filterByCreatedAt($createdAt = null, $comparison = Criteria::EQUAL)
    {

        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::GREATER_EQUAL && $comparison != Criteria::GREATER_THAN) {
                    throw new AmbiguousComparisonException('\'min\' requires explicit Criteria::GREATER_EQUAL, Criteria::GREATER_THAN or SprykerCriteria::BETWEEN when \'max\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                if ($comparison != SprykerCriteria::BETWEEN && $comparison != Criteria::LESS_EQUAL && $comparison != Criteria::LESS_THAN) {
                    throw new AmbiguousComparisonException('\'max\' requires explicit Criteria::LESS_EQUAL, Criteria::LESS_THAN or SprykerCriteria::BETWEEN when \'min\' is also needed as comparison criteria.');
                }
                $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }

            if (!in_array($comparison, [Criteria::IN, Criteria::NOT_IN])) {
                throw new AmbiguousComparisonException('$createdAt of type array requires one of [Criteria::IN, Criteria::NOT_IN] as comparison criteria.');
            }
        }

        $query = $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT, $createdAt, $comparison);

        return $query;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSpyEventBehaviorEntityChange $spyEventBehaviorEntityChange Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($spyEventBehaviorEntityChange = null)
    {
        if ($spyEventBehaviorEntityChange) {
            $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_ID_EVENT_BEHAVIOR_ENTITY_CHANGE, $spyEventBehaviorEntityChange->getIdEventBehaviorEntityChange(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_event_behavior_entity_change table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyEventBehaviorEntityChangeTableMap::clearInstancePool();
            SpyEventBehaviorEntityChangeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyEventBehaviorEntityChangeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyEventBehaviorEntityChangeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyEventBehaviorEntityChangeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Order by create date desc
     *
     * @return $this The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        $this->addDescendingOrderByColumn(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT);

        return $this;
    }

    /**
     * Filter by the latest created
     *
     * @param int $nbDays Maximum age of in days
     *
     * @return $this The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        $this->addUsingAlias(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);

        return $this;
    }

    /**
     * Order by create date asc
     *
     * @return $this The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        $this->addAscendingOrderByColumn(SpyEventBehaviorEntityChangeTableMap::COL_CREATED_AT);

        return $this;
    }

}
