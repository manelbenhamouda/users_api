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
  $router->get('users',  ['uses' => 'UserController@index']);

  $router->get('users/{id}', ['uses' => 'UserController@show']);

  $router->post('users', ['uses' => 'UserController@store']);

  $router->put('users/{id}', ['uses' => 'UserController@update']);

  $router->delete('users/{id}', ['uses' => 'UserController@destroy']);

  $router->get('documentation', function () {
    return response()->json(json_decode(file_get_contents(storage_path('api-docs/openapi.json')), true));
  });
});