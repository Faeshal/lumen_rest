<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use GrahamCampbell\ResultType\Success;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    // * Authors
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);

    // * Users
    $router->post('register', ['uses' => 'UserController@register']);
    $router->post('login', ['uses' => 'UserController@login']);
});
