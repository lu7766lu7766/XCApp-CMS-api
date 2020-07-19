<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/27
 * Time: 上午 11:21
 */

namespace Modules\OtpAuth\Entities;

trait OtpAuthRelationTraitHelper
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function otpAuthOwn()
    {
        return $this->morphToMany(
            OtpAuth::class,
            'otp_auth_own_model',
            'otp_auth_own',
            'otp_auth_own_model_id',
            'otp_auth_id'
        );
    }
}
