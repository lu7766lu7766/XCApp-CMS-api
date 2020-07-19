<?php
Route::group(
    [
        'middleware' => ['api'],
        'prefix'     => 'guestbook',
        'namespace'  => 'Modules\GuestBook\Http\Controllers'
    ],
    function () {
        Route::group(['prefix' => 'manager', 'middleware' => 'permission'], function () {
            Route::post('/', 'GuestBookController@index')->name('guest_book_index');
            Route::post('/total', 'GuestBookController@total')->name('guest_book_total');
            Route::group(['prefix' => 'maintain'], function () {
                Route::post('info', 'GuestBookController@info')->name('guest_book_info');
                Route::delete('/', 'GuestBookController@delete')->name('guest_book_delete');
            });
        });
        Route::group(['prefix' => 'user'], function () {
            Route::post('comment', 'GuestBookForFrontController@comment');
            Route::post('like', 'GuestBookForFrontController@like');
            Route::post('dislike', 'GuestBookForFrontController@disLike');
            Route::group(['prefix' => 'configure'], function () {
                Route::post('/', 'GuestBookForFrontController@store');
                Route::put('/', 'GuestBookForFrontController@update');
                Route::delete('/', 'GuestBookForFrontController@delete');
            });
        });
    }
);
Route::group(
    ['middleware' => 'cros', 'prefix' => 'guestbook'],
    function () {
        Route::post('/report', function () {
            return 1;
        });
        Route::post('/', '\Modules\GuestBook\Http\Controllers\GuestBookController@index');
        Route::post('/total', '\Modules\GuestBook\Http\Controllers\GuestBookController@total');
        Route::post('/info', '\Modules\GuestBook\Http\Controllers\GuestBookForFrontController@info');
    }
);
