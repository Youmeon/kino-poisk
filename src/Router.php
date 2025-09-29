<?php

namespace App;

class Router
{
    // передаём uri запроса чтобы было понятно какой маршрут мы вызываем
    public function dispatch(string $uri): void
    {
        $routes = $this->getRoutes();

        // ключ $uri->вызов
        $routes[$uri]();
    }

    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}
