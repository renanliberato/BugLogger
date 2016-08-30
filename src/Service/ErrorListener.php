<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 17:31
 */

namespace BugLogger\Service;

use BugLogger\Model\LogException;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

class ErrorListener
{
    protected $listeners = array();

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
//        $sharedEvents = $events->getSharedManager();
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH_ERROR,
            array($this, 'logger')
        );

        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_RENDER_ERROR,
            array($this, 'logger')
        );
    }

    /**
     * {@inheritDoc}
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param $e MvcEvent
     */
    public function logger($e)
    {
        $config     = $e->getApplication()->getServiceManager()->get('Config');
        $exception  = $e->getParam('exception');
        $logger     = $e->getApplication()->getServiceManager()->get(Logger::class);
        $ignoreCode = $config['logbug']['ignore']['code'];

        if (!$exception) {
            return;
        }

        if (in_array($exception->getCode(), $ignoreCode)) {
            return;
        }

        $logException = new LogException();
        $logException->exchangeArray(array(
            'id'         => 0,
            'class'      => get_class($exception),
            'code'       => $exception->getCode(),
            'message'    => $exception->getMessage(),
            'stacktrace' => $exception->getTraceAsString(),
            'datetime'   => date("Y-m-d H:i:s"),
        ));
        $logger->log($logException);
    }
}