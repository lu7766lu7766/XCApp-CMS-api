<?php
Route::group(
    ['middleware' => 'web', 'prefix' => 'counter', 'namespace' => 'Modules\Counter\Http\Controllers'],
    function () {
        Route::get('/', 'CounterController@simple');
    }
);
