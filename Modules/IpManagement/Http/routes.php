<?php
Route::group(
    [
        'middleware' => 'api',
        'prefix'     => 'ip_management',
        'namespace'  => 'Modules\IpManagement\Http\Controllers'
    ],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::post('list', 'IpManagementController@list')->name('ip_list');
            Route::post('total', 'IpManagementController@total')->name('ip_list_total');
            Route::post('detail', 'IpManagementController@detail')->name('ip_detail');
            Route::post('maintain', 'IpManagementController@add')->name('ip_add');
            Route::put('maintain', 'IpManagementController@update')->name('ip_update');
            Route::delete('maintain', 'IpManagementController@del')->name('ip_del');
        });
    }
);
Route::group(
    ['middleware' => 'api', 'prefix' => 'ip_info', 'namespace' => 'Modules\IpManagement\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::post('list', 'IpManagementController@data')->name('ip_info_list');
            Route::post('maintain', 'IpManagementController@add')->name('ip_info_add');
            Route::delete('maintain', 'IpManagementController@del')->name('ip_info_del');
        });
    }
);
