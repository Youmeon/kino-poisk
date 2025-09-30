<?php

use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Route;

return [
    Route::get('/home', [HomeController::class, 'index']), //массив который содержит путь до класса
    Route::get('/movies', [MoviesController::class, 'index']),
    Route::post('/test', function () {
        include_once APP_PATH . '/views/pages/test.php';
    }),
];
