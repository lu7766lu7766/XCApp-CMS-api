<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/1
 * Time: 下午 04:00
 */
return [
    /*
   |--------------------------------------------------------------------------
   | SNS Config Format Sample
   |--------------------------------------------------------------------------
   |
   | Here are SNS config Format Sample.
   | By copying this format to your specified sns config,
   | it will help you quickly complete the sns connection setup.
   | Set the environment parameter(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, AWS_REGION) in your ".env" file.
   |
   */
    'default' => [
        'connection' => [
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID', ''),
                'secret' => env('AWS_SECRET_ACCESS_KEY', '')
            ],
            'region'      => env('AWS_REGION', 'ap-southeast-1'),
            'version'     => 'latest'
        ],
        'id'         => env('AWS_ACCOUNT_ID', '')
    ]
];
