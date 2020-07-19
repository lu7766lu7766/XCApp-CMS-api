<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2017/8/8
 * Time: 下午 06:59
 */

namespace Modules\Base\Contract;

use Modules\Account\Contract\IAccountInfo;

interface ISessionReader
{
    /**
     * @return IAccountInfo|null
     */
    public function account();
}
