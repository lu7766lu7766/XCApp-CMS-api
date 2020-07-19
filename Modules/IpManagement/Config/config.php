<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'ip_list'       => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'ip_management/maintain' // node uri at database
        ],
        'ip_list_total' => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'ip_management/maintain' // node uri at database
        ],
        'ip_detail'     => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'ip_management/maintain' // node uri at database
        ],
        'ip_info_list'  => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'ip_info/maintain' // node uri at database
        ]
    ]
];
