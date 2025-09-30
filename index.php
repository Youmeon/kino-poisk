<?php

define('APP_PATH', __DIR__); #корневой путь нашего приложения в докер контейнере, общий маршрут

require_once APP_PATH . '/vendor/autoload.php';

use App\App;

$app = new App();

$app->run();
