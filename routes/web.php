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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('makanan', 'MakananController@create');
$router->get('makanan', 'MakananController@read');
$router->post('makanan/{id}', 'MakananController@update');
$router->get('makanan/{id}', 'MakananController@detail');
$router->delete('makanan/{id}', 'MakananController@delete');