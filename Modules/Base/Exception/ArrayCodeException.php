<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:12
 */

namespace Modules\Base\Exception;

class ArrayCodeException extends \Exception
{
    /**
     * @var array
     */
    protected $codes = [];

    /**
     * ArrayCodeException constructor.
     * @param array $codes error code(s)
     * @param string $logMsg
     */
    public function __construct(array $codes, string $logMsg = "")
    {
        parent::__construct($logMsg, 0, null);
        $this->codes = $codes;
    }

    /**
     * @return array
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * @return string
     */
    public function codesToJson()
    {
        return json_encode($this->codes);
    }
}
