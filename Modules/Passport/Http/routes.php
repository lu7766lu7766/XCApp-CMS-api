<?php
Route::group(
    [
        'middleware' => ['cros', 'throttle:20,1'],
        'prefix'     => 'passport',
        'namespace'  => 'Modules\Passport\Http\Controllers'
    ],
    function () {
        Route::post('/login', [
            'uses' => 'PassportController@issueToken',
        ]);
        Route::post('/token/personal/generate', [
            'uses'       => 'PassportController@personalTokenGenerate',
            'middleware' => 'api',
        ]);
    }
);
