<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 18:30
 */

namespace BugLogger\Model\Factory;


use Interop\Container\ContainerInterface;
use BugLogger\Model\LogException;
use BugLogger\Model\LogExceptionTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class LogExceptionTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter            = $container->get('logAdapter');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new LogException());

        $tableGateway = new TableGateway('exception', $adapter, null, $resultSetPrototype);

        return new LogExceptionTable($tableGateway);
    }

}