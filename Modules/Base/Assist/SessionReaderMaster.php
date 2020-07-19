<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 02:37
 */

namespace Modules\Base\Assist;

use Modules\Account\Assist\FullAccountInfo;
use Modules\Account\Contract\IAccountInfo;
use Modules\Base\Contract\ISessionReader;

class SessionReaderMaster implements ISessionReader
{
    /**
     * SessionMaster constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return IAccountInfo|null
     */
    public function account()
    {
        $result = null;
        $data = \Session::get('account');
        if (!is_null($data)) {
            $result = new FullAccountInfo($data);
        }

        return $result;
    }
}
