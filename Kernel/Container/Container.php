<?php

namespace App\Kernel\container;

use App\Kernel\Router\Router;
use App\Kernel\http\Request;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public function __construct()
    {
        $this->registerServices();
    }
    // региструем все классы нашего приложения которые могут нам пригодиться
    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->router = new Router();
    }
}
