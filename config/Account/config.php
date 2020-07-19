<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'account_show_list'       => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'account/maintain' // node uri at database
        ],
        'account_show_list_total' => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'account/maintain' // node uri at database
        ],
    ]
];
