<?php
Route::group(
    [
        'middleware' => ['api', 'permission'],
        'prefix'     => 'pushnotification',
        'namespace'  => 'Modules\PushNotification\Http\Controllers'
    ],
    function () {
        Route::group(['prefix' => 'message'], function () {
            Route::post('/', 'PushNotificationController@index')->name('push_notification_list');
            Route::get('/', 'PushNotificationController@total')->name('push_notification_total');
            //發送推播
            Route::post('/push', 'PushNotificationController@push')->name('push_notification_push');
            //topic
            Route::get('/topic', 'TopicController@all')->name('push_notification_topic');
            Route::group(['prefix' => 'maintain'], function () {
                Route::get('/{id}', 'PushNotificationController@edit')->name('push_notification_edit');
                Route::post('/', 'PushNotificationController@store')->name('push_notification_store');
                Route::put('/', 'PushNotificationController@update')->name('push_notification_update');
                Route::delete('/', 'PushNotificationController@destroy')->name('push_notification_destroy');
            });
        });
    }
);



