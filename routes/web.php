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

$router->get('/userRepo', 'UserController@userRepo');


// API route group
$router->group(['middleware' => 'auth', 'prefix' => 'api'], function () use ($router) {

    $router->get('/todo', 'todoController@index');
    $router->get('/todo/{id}', 'todoController@show');
    $router->post('/todo', 'todoController@store');
    $router->put('/todo/{id}', 'todoController@update');
    $router->delete('/todo/{id}', 'todoController@destroy');


    // Matches "/api/register
    $router->post('register', 'AuthController@register');
    
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/user 
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');

    $router->post('uploadImage', 'ImageController@upload');

    
 });