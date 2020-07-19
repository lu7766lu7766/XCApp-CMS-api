<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'category_list'    => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'web_link/category'
        ],
        'category_store'   => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'web_link/category'
        ],
        'category_total'   => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'web_link/category'
        ],
        'web_link_store'   => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'web_link'
        ],
        'web_link_total'   => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'web_link'
        ],
        'web_link_options' => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'web_link'
        ],
        'web_link_upload'  => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'web_link'
        ],
    ]
];
