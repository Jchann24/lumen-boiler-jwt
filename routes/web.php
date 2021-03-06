<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'API\AuthController@register');
    $router->post('login', 'API\AuthController@login');

});

$router->group([
    'middleware' => 'auth',
    'prefix' => 'api',
], function () use ($router) {
    $router->get('me', 'API\AuthController@me');
    $router->post('logout', 'API\AuthController@logout');
});

// $router->get('/key', function() {
//     return \Illuminate\Support\Str::random(32);
// });
