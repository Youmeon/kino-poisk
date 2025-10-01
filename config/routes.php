<?php

use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Kernel\Router\Route;
use App\pages\admin\movies\add;

return [
    Route::get('/home', [HomeController::class, 'index']), //массив который содержит путь до класса
    Route::get('/movies', [MoviesController::class, 'index']),
    Route::get('/admin/movies/add', [MoviesController::class, 'add']), //добавляем отображение страницы формы add.php
    Route::post('/admin/movies/add', [MoviesController::class, 'store']),
    Route::post('/test', function () {
        include_once APP_PATH . '/views/pages/test.php';
    }),
];
