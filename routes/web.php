<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use GrahamCampbell\ResultType\Success;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});
