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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->get('posts/{id}', 'BlogController@show');
$router->get('posts', 'BlogController@index');
$router->post('posts', 'BlogController@create');
$router->delete('posts/{id}', 'BlogController@delete');
$router->put('posts', 'BlogController@update');

$router->get('authors/{id}', 'AuthorController@show');
$router->get('authors', 'AuthorController@index');
$router->post('authors', 'AuthorController@create');
$router->delete('authors/{id}', 'AuthorController@delete');
$router->put('authors', 'AuthorController@update');

$router->get('categories/{id}', 'CategoryController@show');
$router->get('categories', 'CategoryController@index');
$router->post('categories', 'CategoryController@create');
$router->delete('categories/{id}', 'CategoryController@delete');
$router->put('categories', 'CategoryController@update');
