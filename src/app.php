<?php 

namespace App;

class app {
    public function run():void
    {
        $routes = require_once APP_PATH . '/config/routes.php'; // Импортируем роутер 

        $uri = $_SERVER['REQUEST_URI'];

        $routes[$uri](); // ключ $uri->вызов
    }
}