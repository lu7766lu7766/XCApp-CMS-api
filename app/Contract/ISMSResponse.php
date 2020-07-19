<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/9
 * Time: 下午 03:20
 */

namespace App\Contract;

interface ISMSResponse
{
    /**
     * @return bool
     */
    public function isSuccess();

    /**
     * @return string|null
     */
    public function getIdentifier();
}
