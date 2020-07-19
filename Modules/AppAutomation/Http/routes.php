<?php
Route::group(
    [
        'middleware' => ['api'],
        'prefix'     => 'app_automation',
        'namespace'  => 'Modules\AppAutomation\Http\Controllers'
    ],
    function () {
        Route::group(['permission'], function () {
            Route::post('list', 'AppAutomationController@list')->name('app_auto_list');
            Route::post('total', 'AppAutomationController@total')->name('app_auto_list_total');
            Route::post('detail', 'AppAutomationController@detail')->name('app_auto_detail');
            Route::post('maintain', 'AppAutomationController@add')->name('app_auto_add');
            Route::put('maintain', 'AppAutomationController@update')->name('app_auto_update');
            Route::delete('maintain', 'AppAutomationController@del')->name('app_auto_del');
            Route::post('upload', 'AppAutomationController@upload')->name('app_auto_upload');
            Route::post('package', 'AppAutomationController@package')->name('app_auto_package');
        });
    }
);
Route::group(
    ['prefix' => 'app_automation', 'namespace' => 'Modules\AppAutomation\Http\Controllers'],
    function () {
        Route::post('callback', 'AppAutomationController@callback')->name('app_auto_callback');
    }
);
