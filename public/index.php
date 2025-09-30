<?php

define('APP_PATH', dirname(__DIR__)); #корневой путь нашего приложения в докер контейнере, общий маршрут

require_once APP_PATH . '/vendor/autoload.php';

use App\Kernel\App;

$app = new App();

$app->run();
