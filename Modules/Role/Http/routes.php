<?php
Route::group(
    ['middleware' => 'api', 'prefix' => 'role', 'namespace' => 'Modules\Role\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::get('total', 'RoleController@total')->name('role_total');
            Route::post('index', 'RoleController@index')->name('role_index');
            Route::get('maintain/{id}', 'RoleMaintainController@info')->name('maintain_role_info');
            Route::post('maintain', 'RoleMaintainController@edit');
            Route::delete('maintain/{id}', 'RoleMaintainController@delete')->name('maintain_role_delete');
            Route::post('node/map', 'RoleNodeController@map')->name('get_role_node_map');
            Route::post('node/configure', 'RoleNodeController@bind')->name('role_node_configure_bind');
        });
    }
);
