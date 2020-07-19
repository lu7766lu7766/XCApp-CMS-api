<?php
Route::group(['middleware' => 'api', 'prefix' => 'node', 'namespace' => 'Modules\Node\Http\Controllers'], function () {
    Route::get('map', 'NodeController@tree');
    Route::group(['prefix' => 'map'], function () {
        Route::get('/sort', 'NodeSortController@index');
        Route::post('/sort', 'NodeSortController@save');
    });
});
