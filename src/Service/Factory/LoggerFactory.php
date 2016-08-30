<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 18:11
 */

namespace BugLogger\Service\Factory;


use Interop\Container\ContainerInterface;
use BugLogger\Model\LogExceptionTable;
use BugLogger\Service\Logger;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoggerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return Logger
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $logTable = $container->get(LogExceptionTable::class);

        return new Logger($logTable);
    }
}