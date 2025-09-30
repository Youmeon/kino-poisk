<?php

use App\Route;

return [
    Route::get('/home', function () {
        include_once APP_PATH . '/views/pages/home.php';
    }),
    Route::get('/movies', function () {
        include_once APP_PATH . '/views/pages/movies.php';
    }),
    Route::post('/test', function () {
        include_once APP_PATH . '/views/pages/test.php';
    }),
];
