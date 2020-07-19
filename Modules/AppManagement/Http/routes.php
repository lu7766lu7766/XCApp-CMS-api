<?php
//app管理
Route::group(
    ['middleware' => 'api', 'prefix' => 'app_management', 'namespace' => 'Modules\AppManagement\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::post('/', 'AppManagementController@list')->name('app_mg_list');
            Route::post('/data_manipulation', 'AppManagementController@store');
            Route::put('/data_manipulation', 'AppManagementController@update');
            Route::delete('/data_manipulation', 'AppManagementController@delete');
            Route::post('/total', 'AppManagementController@total')->name('app_mg_total');
        });
        Route::get('/options', 'AppManagementController@options');
    }
);
//app設定
Route::group(
    ['middleware' => 'api', 'prefix' => 'app_setting', 'namespace' => 'Modules\AppManagement\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::post('/', 'PersonalController@list')->name('app_setting_list');
            Route::post('/data_manipulation', 'PersonalController@store');
            Route::put('/data_manipulation', 'PersonalController@update');
            Route::delete('/data_manipulation', 'PersonalController@delete');
            Route::post('/total', 'PersonalController@total')->name('app_setting_total');
            Route::get('front/{code}', 'AppManagementForFrontController@appInfo')->name('app_setting_front');
            Route::post('/attach/device', 'PersonalController@deviceStore')->name('app_setting_attach_device');
        });
    }
);

