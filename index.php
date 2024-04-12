<?php

    require 'vendor/autoload.php';

    use App\Core\Routes\Route;

    // DEMO - ROUTE, CONTROLLER, METHODS, VIEWS

    Route::run('/', 'home@index', 'get');

    Route::run('/team', 'team@index');
    Route::run('/team/position/{id}', 'team@getPosition');

    Route::run('/services', 'services@index');
    Route::run('/services/{slug}', 'services@getService');

    Route::run('/user/register', 'user@register', 'post');
