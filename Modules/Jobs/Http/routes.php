<?php
Route::group(
    ['middleware' => 'web', 'prefix' => 'job', 'namespace' => 'Modules\Job\Http\Controllers'],
    function () {
        Route::get('/', 'JobController@simple');
    }
);
