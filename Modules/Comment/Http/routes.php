<?php
Route::group(
    [
        'middleware' => 'api',
        'prefix'     => 'theme',
        'namespace'  => 'Modules\Comment\Http\Controllers'
    ],
    function () {
        Route::post('/', 'ThemeController@addComment');
        Route::post('/get_theme', 'ThemeController@getTheme')->name('theme_info');
        Route::post('/views', 'ThemeController@views')->name('theme_views');
        Route::post('/reaction', 'ThemeController@reaction')->name('theme_reaction');
        Route::post('/cancel_reaction', 'ThemeController@cancelReaction')->name('theme_cancel_reaction');
    }
);
Route::group(
    [
        'middleware' => 'api',
        'prefix'     => 'comment',
        'namespace'  => 'Modules\Comment\Http\Controllers'
    ],
    function () {
        Route::post('/get_comment', 'CommentController@getComment');
        Route::post('/total', 'CommentController@total')->name('comment_total');
        Route::post('/reaction', 'CommentController@reaction')->name('comment_reaction');
        Route::post('/cancel_reaction', 'CommentController@cancelReaction')->name('comment_cancel_reaction');
    }
);
Route::group(
    ['middleware' => 'cros', 'prefix' => 'theme'],
    function () {
        Route::post('/report', function () {
            return 1;
        });
    }
);
Route::group(
    ['middleware' => 'cros', 'prefix' => 'comment'],
    function () {
        Route::post('/report', function () {
            return 1;
        });
    }
);
