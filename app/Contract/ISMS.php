<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/8
 * Time: 下午 03:35
 */

namespace App\Contract;

interface ISMS
{
    /**
     * @param string $phone
     * @param string $message
     * @return ISMSResponse
     */
    public function send(string $phone, string $message);
}
