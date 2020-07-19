<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'app_auto_list'       => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_automation/list' // node uri at database
        ],
        'app_auto_list_total' => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_automation/list_total' // node uri at database
        ],
        'app_auto_detail'     => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'app_automation/detail' // node uri at database
        ],
        'app_auto_upload'     => [ // route name
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'app_automation/upload' // node uri at database
        ],
        'app_auto_package'    => [ // route name
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'app_automation/package' // node uri at database
        ],
        'app_auto_callback'   => [ // route name
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'app_automation/callback' // node uri at database
        ]
    ]
];
