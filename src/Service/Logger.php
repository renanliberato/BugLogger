<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 18:10
 */

namespace BugLogger\Service;


use BugLogger\Model\LogException;
use BugLogger\Model\LogExceptionTable;

/**
 * Class Logger
 *
 * @package LogBug\Service
 */
class Logger
{
    /**
     * @var LogExceptionTable
     */
    private $tableGateway;

    public function __construct(LogExceptionTable $tableGateway)
    {
        $this->tableGateway = $tableGateway;

    }

    /**
     * @param LogException $logException
     */
    public function log(LogException $logException)
    {
        $this->tableGateway->save($logException);
    }
}