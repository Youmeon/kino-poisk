<?php

namespace App\Kernel;

use App\Kernel\Container\Container;
use App\Kernel\Router\Router;
use App\Kernel\http\Request;


class App //запускает приложение и инициализирует контейнер
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run(): void
    {
        // dd($this->container);
        // dd($this->container->request->uri());
        $this->container->router->dispatch($this->container->request->uri(), $this->container->request->method());
        // dd($request); содержит все данные суперглобальных переменных
        // $uri = $_SERVER['REQUEST_URI'];
        // $method = $_SERVER['REQUEST_METHOD'];
        // dd($request->uri()); нужно убрать параметр
        // $router->dispatch($request->uri(), $request->method());
    }
}
