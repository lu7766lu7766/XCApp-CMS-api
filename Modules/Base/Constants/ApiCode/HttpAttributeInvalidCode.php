<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:59
 */

namespace Modules\Base\Constants\ApiCode;

class HttpAttributeInvalidCode
{
    const ID_REQUIRED = 1000;
    const ID_BE_INTEGER = 1001;
    const ACCOUNT_REQUIRED = 1002;
    const PASSWORD_REQUIRED = 1003;
    const OLD_PASSWORD_REQUIRED = 1004;
    const NEW_PASSWORD_REQUIRED = 1005;
    const PAGE_MUST_BE_INTEGER = 1007;
    const PERPAGE_MUST_BE_INTEGER = 1008;
    const ACCOUNT_VALIDATE_ALPHA_NUM_FAIL = 1009;
    const STATUS_REQUIRE = 1010;
    const CONFIRM_PASSWORD_NOT_SAME = 1011;
    const ROLE_REQUIRED = 1012;
    const DISPLAY_NAME_REQUIRED = 1013;
    const PERPAGE_BETWEEN_1_100 = 1014;
    const ENABLE_MUST_IN_N_Y_LABEL = 1015;
    const NODES_BE_ARRAY = 1016;
    const DISPLAY_NAME_LENGTH_BETWEEN_4_32 = 1017;
    const IMAGE_REQUIRE = 1018;
    const IMAGE_TYPE_WRONG = 1019;
    const PERPAGE_SIZE_BETWEEN_1_100 = 1020;
}
