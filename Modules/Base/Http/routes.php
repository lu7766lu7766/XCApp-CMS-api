<?php
Route::group([
    'middleware' => [
        'api',
        'permission'
    ],
    'prefix'     => 'base',
    'namespace'  => 'Modules\Base\Http\Controllers'
], function () {
    Route::get('test', ['uses' => 'BaseTestController@simple'])->name('base_test');
});
