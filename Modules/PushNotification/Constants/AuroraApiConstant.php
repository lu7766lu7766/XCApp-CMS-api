<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/23
 * Time: 下午 01:54
 */

namespace Modules\PushNotification\Constants;

class AuroraApiConstant
{
    const SERVER_INTERNAL_ERROR_CODE = 1000;
    const UNSUPPORTED_GET_METHOD_CODE = 1001;
    const MISSING_PARAMETER_CODE = 1002;
    const INVALID_PARAMETER_CODE = 1003;
    const APP_KEY_SECRET_CODE_VALIDATION_FAIL = 1004;
    const MESSAGE_BODY_LIMIT_CODE = 1005;
    const APP_KEY_WRONG_CODE = 1008;
    const PUSH_TARGET_UNSUPPORTED_CODE = 1009;
    const NO_HAVE_SETTING_TAG_CODE = 1011;
    const ONLY_SUPPORTED_HTTPS_CODE = 1020;
    const REQUEST_EXPIRED_CODE = 1030;
    const USAGE_LIMIT_CODE = 2002;
    const APP_KEY_BE_BLOCK_CODE = 2003;
    const NO_ADD_WHITE_LIST_CODE = 2004;
    const MESSAGE_USAGE_LIMIT_CODE = 2005;

    /**
     * @param $code
     * @return int
     */
    public static function getMappingCode($code)
    {
        $data = [
            self::SERVER_INTERNAL_ERROR_CODE          => PusherCommonApiCodeConstant::SERVER_INTERNAL_ERROR_CODE,
            self::UNSUPPORTED_GET_METHOD_CODE         => PusherCommonApiCodeConstant::INVALID_ACTION_CODE,
            self::MISSING_PARAMETER_CODE              => PusherCommonApiCodeConstant::MISSING_REQUIRED_PARAMETER_CODE,
            self::INVALID_PARAMETER_CODE              => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
            self::APP_KEY_SECRET_CODE_VALIDATION_FAIL => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
            self::MESSAGE_BODY_LIMIT_CODE             => PusherCommonApiCodeConstant::MESSAGE_SIZE_LIMIT_CODE,
            self::APP_KEY_WRONG_CODE                  => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
            self::PUSH_TARGET_UNSUPPORTED_CODE        => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
            self::NO_HAVE_SETTING_TAG_CODE            => PusherCommonApiCodeConstant::TARGET_NOT_FOUND_CODE,
            self::ONLY_SUPPORTED_HTTPS_CODE           => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
            self::REQUEST_EXPIRED_CODE                => PusherCommonApiCodeConstant::REQUEST_EXPIRED_CODE,
            self::USAGE_LIMIT_CODE                    => PusherCommonApiCodeConstant::THROTTLING_EXCEPTION_CODE,
            self::APP_KEY_BE_BLOCK_CODE               => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
            self::NO_ADD_WHITE_LIST_CODE              => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
            self::MESSAGE_USAGE_LIMIT_CODE            => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
        ];
        $code = isset($data[$code]) ? $data[$code] : PusherCommonApiCodeConstant::MAPPING_ERROR_CODE;

        return $code;
    }
}
