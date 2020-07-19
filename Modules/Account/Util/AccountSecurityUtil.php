<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 02:10
 */

namespace Modules\Account\Util;

class AccountSecurityUtil
{
    /**
     * @param string $account
     * @param string $password
     * @return string
     */
    public static function passwordCrypt(string $account, string $password)
    {
        return md5(sha1($account . config('app.key') . $password));
    }
}
