<?php

namespace BugLogger;

use BugLogger\Service\ErrorListener;
use Zend\Mvc\MvcEvent;
//use LogBug\Service\Error as LogBugError;

class Module {

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e) {

        $eventManager  = $e->getTarget()->getEventManager();
        $errorListener = new ErrorListener();
        $errorListener->attach($eventManager);
    }

    /**
     * @return mixed
     */
    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @return array
     */
    public function getServiceConfig() {
        return [
            'factories' => [
                Model\LogExceptionTable::class => Model\Factory\LogExceptionTableFactory::class,
                Service\Logger::class => Service\Factory\LoggerFactory::class,
            ],
        ];
    }

}
