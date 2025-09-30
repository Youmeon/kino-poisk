<?php

namespace App\Kernel;

use App\Kernel\Router\Router;
use App\Kernel\http\Request;

class App
{
    public function run(): void
    {
        $router = new Router();
        $request = Request::createFromGlobals();
        // dd($request); содержит все данные суперглобальных переменных
        // $uri = $_SERVER['REQUEST_URI'];
        // $method = $_SERVER['REQUEST_METHOD'];
        // dd($request->uri()); нужно убрать параметр
        $router->dispatch($request->uri(), $request->method());
    }
}
