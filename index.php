<?php 

    require __DIR__ . '/database.php';
    require __DIR__ . '/model.php';
    require __DIR__ . '/controller.php';
    require __DIR__ . '/route.php';

    Route::run('/users', 'users@index');
    Route::run('/welcome-student', 'users@welcome');

?>