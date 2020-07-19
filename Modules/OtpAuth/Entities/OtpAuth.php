<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/26
 * Time: 下午 04:59
 */

namespace Modules\OtpAuth\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class otp_auth
 * @package Modules\Verify\Entities
 * @property string otp_auth_status
 * @property string content
 * @property string expires_at
 */
class OtpAuth extends BaseORM
{
    protected $table = 'otp_auth';
    protected $fillable = [
        'otp_auth_status',
        'content',
        'expires_at'
    ];
    protected $hidden = ['content'];
}
