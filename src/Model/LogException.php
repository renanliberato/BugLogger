<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 29/08/16
 * Time: 18:23
 */

namespace BugLogger\Model;

/**
 * Class LogException
 *
 * @package LogBug\Model
 */
class LogException
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $stacktrace;

    /**
     * @var \DateTime
     */
    protected $datetime;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id           = !empty($data['id'])? $data['id'] :null;
        $this->class        = !empty($data['class'])? $data['class']:null;
        $this->code         = !empty($data['code'])? $data['code']:null;
        $this->message      = !empty($data['message'])? $data['message'] :null;
        $this->stacktrace   = !empty($data['stacktrace'])? $data['stacktrace'] :null;
        $this->datetime     = !empty($data['datetime'])? $data['datetime'] :null;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return array(
            'id'            => $this->id,
            'class'         => $this->class,
            'code'          => $this->code,
            'message'       => $this->message,
            'stacktrace'    => $this->stacktrace,
            'datetime'      => $this->datetime
        );
    }
}