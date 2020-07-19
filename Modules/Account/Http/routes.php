<?php
Route::group(
    ['middleware' => 'api', 'prefix' => 'account', 'namespace' => 'Modules\Account\Http\Controllers'],
    function () {
        Route::group(['middleware' => 'permission'], function () {
            Route::post('list', 'AccountController@showList')->name('account_show_list');
            Route::post('list/total', 'AccountController@showListTotal')->name('account_show_list_total');
            Route::post('maintain', 'AccountController@create');
            Route::put('maintain', 'AccountController@update');
            Route::delete('maintain', 'AccountController@softDelete');
        });
        Route::get('self', 'AccountController@showSelf');
        Route::post('self', 'AccountController@updateSelf');
        Route::post('member/sign_up', 'MemberAccountController@create')->middleware('throttle:3,1');
        Route::post('otp/apply', 'AccountOtpAuthController@apply')->middleware('throttle:1,1');
        Route::post('otp/verify', 'AccountOtpAuthController@verify');
    }
);
