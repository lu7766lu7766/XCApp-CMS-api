<?php
Route::group(
    [
        'middleware' => ['api', 'permission'],
        'prefix'     => 'news',
        'namespace'  => 'Modules\News\Http\Controllers'
    ],
    function () {
        Route::group(['prefix' => 'category'], function () {
            Route::post('/', 'CategoryController@index')->name('news_category_list');
            Route::post('/upload', 'CategoryController@uploadImage')->name('news_category_upload');
            Route::post('/total', 'CategoryController@total')->name('news_category_total');
            Route::group(['prefix' => 'maintain'], function () {
                Route::post('/', 'CategoryController@store')->name('news_category_store');
                Route::get('/{id}', 'CategoryController@info')->name('news_category_info');
                Route::put('/', 'CategoryController@update')->name('news_category_update');
                Route::delete('/', 'CategoryController@delete')->name('news_category_delete');
            });
        });
        Route::group(['prefix' => 'management'], function () {
            Route::post('/', 'ManagementController@index')->name('news_management_list');
            ROute::get('/', 'ManagementController@categoryList')->name('news_management_category_list');
            Route::post('/upload', 'ManagementController@uploadFile')->name('news_management_upload');
            Route::post('/total', 'ManagementController@total')->name('news_management_total');
            Route::get('/topic', 'TopicController@list')->name('news_management_topic');
            Route::group(['prefix' => 'maintain'], function () {
                Route::get('/{id}', 'ManagementController@info')->name('news_management_info');
                Route::post('/', 'ManagementController@store')->name('news_management_store');
                Route::put('/', 'ManagementController@update')->name('news_management_update');
                Route::delete('/', 'ManagementController@delete')->name('news_management_delete');
            });
        });
    });

