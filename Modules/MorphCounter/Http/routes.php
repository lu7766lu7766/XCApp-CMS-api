<?php
Route::group(
    ['middleware' => 'web', 'prefix' => 'morph_counter', 'namespace' => 'Modules\MorphCounter\Http\Controllers'],
    function () {
        Route::get('/', 'MorphCounterController@simple');
    }
);
