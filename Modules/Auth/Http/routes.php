<?php
Route::group(['middleware' => 'web', 'prefix' => 'auth', 'namespace' => 'Modules\Auth\Http\Controllers'], function () {
    Route::get('/face', 'AuthController@info');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::get('/status', 'AuthController@isLogin');
    Route::group(['middleware' => 'permission'], function () {
    });
});
