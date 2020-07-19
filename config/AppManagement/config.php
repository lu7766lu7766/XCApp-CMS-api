<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        //app管理
        'app_mg_list'               => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_management/data_manipulation'
        ],
        'app_mg_total'              => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_management/data_manipulation'
        ],
        //app設定
        'app_setting_list'          => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_setting/data_manipulation'
        ],
        'app_setting_front'         => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_setting/data_manipulation'
        ],
        'app_setting_total'         => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_setting/data_manipulation'
        ],
        'app_setting_attach_device' => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'app_setting/device'
        ],
    ]
];
