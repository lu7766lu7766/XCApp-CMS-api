<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'guest_book_index'  => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'guest_book'
        ],
        'guest_book_total'  => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'guest_book'
        ],
        'guest_book_info'   => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'guest_book'
        ],
        'guest_book_delete' => [
            'permission' => PermissionValueConstants::DELETE,
            'depend'     => 'guest_book'
        ]
    ]
];
