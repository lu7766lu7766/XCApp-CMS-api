<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'theme_info'              => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'comment'
        ],
        'theme_views'             => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'comment'
        ],
        'theme_reaction'          => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'comment'
        ],
        'theme_cancel_reaction'   => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'comment'
        ],
        'comment_total'           => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'comment'
        ],
        'comment_reaction'        => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'comment'
        ],
        'comment_cancel_reaction' => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'comment'
        ],
    ]
];
