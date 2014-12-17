<?php

Route::get( '/', ['uses' => 'PublicController@index',  'as' => 'public.index']);
Route::post('/', ['uses' => 'PublicController@create', 'as' => 'public.create']);

Route::group(['prefix' => 'admin'], function()
{
    Route::group(['before' => 'guest'], function() {
        Route::get( '/auth', ['uses' => 'AuthController@index',  'as' => 'auth.index']);
        Route::post('/auth', ['uses' => 'AuthController@login',  'as' => 'auth.login']);
    });

    Route::group(['before' => 'auth'], function() {
        Route::get('/auth/logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
        Route::get('/',            ['uses' => 'AdminController@index', 'as' => 'admin.index']);

        Route::group(['prefix' => 'startups'], function() {
            Route::get(   '/',             ['uses' => 'StartupsController@index',           'as' => 'admin.startups.index']);
            Route::delete('/{id}',         ['uses' => 'StartupsController@delete',          'as' => 'admin.startups.delete']);
            Route::get(   '/{id}/feature', ['uses' => 'StartupsController@toggleFeatured',  'as' => 'admin.startups.feature']);
        });

    });
});