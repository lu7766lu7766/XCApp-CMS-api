<?php
Route::group(
    ['middleware' => 'api', 'prefix' => 'web_link', 'namespace' => 'Modules\WebLink\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::group(['prefix' => 'category'], function () {
                Route::post('/', 'CategoryController@list')->name('category_list');
                Route::post('/store', 'CategoryController@store')->name('category_store');
                Route::post('/total', 'CategoryController@total')->name('category_total');
                Route::put('/', 'CategoryController@update');
                Route::delete('/', 'CategoryController@delete');
            });
            Route::post('/', 'WebLinkController@list');
            Route::post('/store', 'WebLinkController@store')->name('web_link_store');
            Route::post('/total', 'WebLinkController@total')->name('web_link_total');
            Route::put('/', 'WebLinkController@update');
            Route::delete('/', 'WebLinkController@delete');
            Route::get('/options', 'WebLinkController@options')->name('web_link_options');
            Route::post('/upload', 'WebLinkController@upload')->name('web_link_upload');
        });
    }
);
//for 前台
Route::group(
    ['prefix' => 'web_link', 'namespace' => 'Modules\WebLink\Http\Controllers'],
    function () {
        Route::get('/front/category', 'FrontController@category');
        Route::post('/front/web_link', 'FrontController@webLink');
        Route::post('/front/total', 'FrontController@total');
    }
);
