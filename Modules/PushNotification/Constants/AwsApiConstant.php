<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/23
 * Time: 下午 03:59
 */

namespace Modules\PushNotification\Constants;

class AwsApiConstant
{
    private static $map = [
        'EndpointDisabled'            => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
        'InvalidParameter'            => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'ParameterValueInvalid'       => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'PlatformApplicationDisabled' => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
        'AccessDeniedException'       => PusherCommonApiCodeConstant::AUTHORIZATION_ERROR_CODE,
        'IncompleteSignature'         => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'InvalidAction'               => PusherCommonApiCodeConstant::INVALID_ACTION_CODE,
        'InvalidParameterCombination' => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'InvalidParameterValue'       => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'InvalidQueryParameter'       => PusherCommonApiCodeConstant::INVALID_PARAMETER_CODE,
        'MissingAction'               => PusherCommonApiCodeConstant::MISSING_ACTION_CODE,
        'MissingParameter'            => PusherCommonApiCodeConstant::MISSING_REQUIRED_PARAMETER_CODE,
        'RequestExpired'              => PusherCommonApiCodeConstant::REQUEST_EXPIRED_CODE,
        'ThrottlingException'         => PusherCommonApiCodeConstant::TARGET_NOT_FOUND_CODE,
        'ValidationError'             => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
        'AuthorizationError'          => PusherCommonApiCodeConstant::AUTHORIZATION_ERROR_CODE,
        'MissingAuthenticationToken'  => PusherCommonApiCodeConstant::MISSING_REQUIRED_PARAMETER_CODE,
        'InvalidClientTokenId'        => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
        'NotFound'                    => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
        'MalformedQueryString'        => PusherCommonApiCodeConstant::VALIDATION_ERROR_CODE,
        'InternalError'               => PusherCommonApiCodeConstant::SERVER_INTERNAL_ERROR_CODE,
        'InternalFailure'             => PusherCommonApiCodeConstant::EXCEPTED_ERROR_CODE,
        'ServiceUnavailable'          => PusherCommonApiCodeConstant::SERVER_INTERNAL_ERROR_CODE,
    ];

    /**
     * @param string $identifierKey
     * @return int
     */
    public static function getMappingCode(string $identifierKey)
    {
        $code = PusherCommonApiCodeConstant::MAPPING_ERROR_CODE;
        if (isset(self::$map[$identifierKey])) {
            $code = self::$map[$identifierKey];
        }

        return $code;
    }
}
