<?php

use Modules\Permission\Constants\PermissionValueConstants;

return [
    'route' => [
        'news_category_list'            => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_category/maintain' // node uri at database
        ],
        'news_category_store'           => [ // route name
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'news_category/maintain'
        ],
        'news_category_info'            => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_category/maintain'
        ],
        'news_category_update'          => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'news_category/maintain'
        ],
        'news_category_delete'          => [
            'permission' => PermissionValueConstants::DELETE,
            'depend'     => 'news_category/maintain'
        ],
        'news_category_upload'          => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'news_category/maintain'
        ],
        'news_category_total'           => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_category/maintain'
        ],
        'news_management_list'          => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_info'          => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_store'         => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_update'        => [
            'permission' => PermissionValueConstants::UPDATE,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_delete'        => [
            'permission' => PermissionValueConstants::DELETE,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_upload'        => [
            'permission' => PermissionValueConstants::CREATE,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_category_list' => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_total'         => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_management/maintain',
        ],
        'news_management_topic'         => [
            'permission' => PermissionValueConstants::READ,
            'depend'     => 'news_management/maintain',
        ],
    ]
];
