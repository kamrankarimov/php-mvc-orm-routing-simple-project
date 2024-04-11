<?php

    error_reporting(E_ALL);

    require 'vendor/autoload.php';

    use App\Core\Routes\Route;

    Route::run('/users', 'user@index');
    Route::run('/welcome', 'user@welcome');
