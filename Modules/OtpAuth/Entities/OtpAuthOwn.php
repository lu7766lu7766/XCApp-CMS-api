<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/26
 * Time: 下午 05:04
 */

namespace Modules\OtpAuth\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OtpAuthOwn extends Pivot
{
    protected $table = 'otp_auth_own';
}
