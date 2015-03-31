<?php

use Illuminate\Routing\Router;

/** @var Router $router */


$router->get( '/', ['uses' => 'PublicController@index',  'as' => 'public.index']);
$router->post('/', ['uses' => 'PublicController@create', 'as' => 'public.create']);

$router->get('/timeline', ['uses' => 'EventsController@index', 'as' => 'events.index']);

$router->group(['prefix' => 'admin'], function(Router $router)
{
    $router->group(['middleware' => 'guest'], function(Router $router) {

        $router->get( '/auth', ['uses' => 'AuthController@index',  'as' => 'auth.index']);
        $router->post('/auth', ['uses' => 'AuthController@login',  'as' => 'auth.login']);

    });

    $router->group(['middleware' => 'auth'], function(Router $router) {

        $router->get('/auth/logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
        $router->get('/',            ['uses' => 'AdminController@index', 'as' => 'admin.index']);

        $router->group(['prefix' => 'startups'], function(Router $router) {

            $router->get(  '/',             ['uses' => 'StartupsController@index',           'as' => 'admin.startups.index']);
            $router->get(  '/{id}/delete',  ['uses' => 'StartupsController@delete',          'as' => 'admin.startups.delete']);
            $router->get(  '/{id}/feature', ['uses' => 'StartupsController@toggleFeatured',  'as' => 'admin.startups.feature']);
            $router->get(  '/{id}/approve', ['uses' => 'StartupsController@approve',         'as' => 'admin.startups.approve']);
            $router->get(  '/{id}/decline', ['uses' => 'StartupsController@decline',         'as' => 'admin.startups.decline']);
            $router->get(  '/{id}/edit',    ['uses' => 'StartupsController@edit',            'as' => 'admin.startups.edit']);
            $router->post( '/{id}/update',  ['uses' => 'StartupsController@update',          'as' => 'admin.startups.update']);

        });

        $router->group(['prefix' => 'users'], function(Router $router) {

            $router->get( '/',            ['uses' => 'UsersController@index',  'as' => 'admin.users.index']);
            $router->post('/',            ['uses' => 'UsersController@create', 'as' => 'admin.users.create']);
            $router->get( '/{id}/delete', ['uses' => 'UsersController@delete', 'as' => 'admin.users.delete']);

        });

        $router->group(['prefix' => 'events'], function(Router $router) {

            $router->get( '/',             ['uses' => 'EventsController@adminIndex', 'as' => 'admin.events.index']);
            $router->get( '/new',          ['uses' => 'EventsController@getCreate',  'as' => 'admin.events.new']);
            $router->post('/',             ['uses' => 'EventsController@create',     'as' => 'admin.events.create']);
            $router->get( '/{id}/delete',  ['uses' => 'EventsController@delete',     'as' => 'admin.events.delete']);
            $router->get( '/{id}/approve', ['uses' => 'EventsController@approve',    'as' => 'admin.events.approve']);
            $router->get( '/{id}/decline', ['uses' => 'EventsController@decline',    'as' => 'admin.events.decline']);
            $router->get( '/{id}/edit',    ['uses' => 'EventsController@edit',       'as' => 'admin.events.edit']);
            $router->post('/{id}/update',  ['uses' => 'EventsController@update',     'as' => 'admin.events.update' ]);

        });
    });
});