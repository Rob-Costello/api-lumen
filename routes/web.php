<?php


/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->router->version();
});


$router->get('test', 'ListsController@test');





$router->group(['prefix' => 'api/'], function ($router) {
	$router->get('login/','UsersController@authenticate');
	$router->post('register/','UsersController@register');
	$router->post('todo/','TodoController@store');
	$router->get('todo/', 'TodoController@index');
	$router->get('todo/{id}/', 'TodoController@show');
	$router->put('todo/{id}/', 'TodoController@update');
	$router->delete('todo/{id}/', 'TodoController@destroy');
});
