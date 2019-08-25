<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('login', 'AuthController@postLogin');

$router->post('register', 'AuthController@postRegister');

$router->group(['middleware' => 'auth:api'], function($app)
{
    $app->get('hash', 'AuthController@getHash');
});