<?php

namespace App\Kernel\Router;

use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Kernel\http\Request;
use App\Kernel\Router\Route;
use App\Kernel\View\View;
use App\Kernel\http\Redirect;
use App\Kernel\Session\Session;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(
        private View $view,
        private Request $request,
        private Redirect $redirect,
        private Session $session,
    ) {
        $this->initRoutes();
    }
    // передаём uri запроса чтобы было понятно какой маршрут мы вызываем
    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (!$route) {
            $this->notFound(); // ошибка
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /** @var Controller $controller() */
            $controller = new $controller();

            // $controller->$action();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);

            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
        // $route->getAction()();
    }

    private function notFound()
    {
        echo '404 | Not Found';
        exit;
    }

    //по http маршруту в группе ищет метод uri
    private function findRoute(string $uri, string $method): Route|false
    {
        // если маршрут не найден в списке возвращаем false
        if (!isset($this->routes[$method][$uri])) {
            return false;
        }
        return $this->routes[$method][$uri];
    }

    private function initRoutes()
    {
        $routes = $this->getRoutes();
        // сортируем пмаршруты, такая группировка позволит гибче с ними взаимодействовать
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
        // dd(['this local function $routes' => $routes, 'this global class array $routes' => $this->routes]);
    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}
