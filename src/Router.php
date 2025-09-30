<?php

namespace App;

use App\Route;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }
    // передаём uri запроса чтобы было понятно какой маршрут мы вызываем
    public function dispatch(string $uri): void
    {
        $routes = $this->getRoutes();

        // ключ $uri->вызов /home
        $routes[$uri]();
    }

    private function initRoutes()
    {
        $routes = $this->getRoutes();

        /* 
        $this->routes = [
            'POST' = [],
            'GET' = [],
        ]
        
        $routes = [
            'GET' = [
                /pipiska/2 => 
            ]
        ]

        method=GET, uri=/pipiska/2
        */

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
        dd(['this local function $routes' => $routes, 'this global class array $routes' => $this->routes]);
    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}
