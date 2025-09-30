<?php

namespace App;

use App\Router;
use App\http\Request;

class App
{
    public function run(): void
    {
        $router = new Router();
        $request = Request::createFromGlobals();
        // dd($request); содержит все данные суперглобальных переменных
        // $uri = $_SERVER['REQUEST_URI'];
        // $method = $_SERVER['REQUEST_METHOD'];
        // dd($request->uri());
        $router->dispatch($request->uri(), $request->method());
    }
}
