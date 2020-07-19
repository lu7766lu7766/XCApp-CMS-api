<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'role_total'               => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'role/maintain' // node uri at database
        ],
        'role_index'               => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'role/maintain'
        ],
        'maintain_role_info'       => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'role/maintain'
        ],
        'maintain_role_delete'     => [
            'permission' => PermissionValueConstants::DELETE,
            'depend'     => 'role/maintain'
        ],
        'get_role_node_map'        => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'role/maintain'
        ],
        'role_node_configure_bind' => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'role/maintain'
        ],
    ]
];
