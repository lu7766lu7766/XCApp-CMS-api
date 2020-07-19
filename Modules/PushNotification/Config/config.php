<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'push_notification_list'    => [ // route name
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'pushnotification/message' // node uri at database
        ],
        'push_notification_total'   => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_push'    => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_topic'   => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_edit'    => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_store'   => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_update'  => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'pushnotification/message'
        ],
        'push_notification_destroy' => [
            'permission' => PermissionValueConstants::DELETE,
            'depend'     => 'pushnotification/message'
        ]
    ]
];
