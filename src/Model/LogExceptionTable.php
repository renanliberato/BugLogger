<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 18:27
 */

namespace BugLogger\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * Class LogExceptionTable
 *
 * @package LogBug\Model
 */
class LogExceptionTable
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    /**
     * LogExceptionTable constructor.
     * @param TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @param array|null $where
     *
     * @return mixed
     */
    public function select(array $where = null)
    {
        return $this->tableGateway->select($where);
    }

    /**
     * @param LogException $logException
     */
    public function save(LogException $logException)
    {
        $this->tableGateway->insert($logException->getData());
    }

    /**
     * @param LogException $logException
     *
     * @param array|null $where
     */
    public function update(LogException $logException, array $where = null)
    {
        $this->tableGateway->update($logException, $where);
    }
}