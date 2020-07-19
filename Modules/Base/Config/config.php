<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'base_test' => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'account/maintain' // node uri at database
        ]
    ]
];
