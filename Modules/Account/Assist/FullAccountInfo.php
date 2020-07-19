<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 04:31
 */

namespace Modules\Account\Assist;

use Modules\Account\Contract\IAccountInfo;

class FullAccountInfo implements IAccountInfo
{
    /**
     * @var array
     */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->data;
    }
}
