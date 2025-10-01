<?php

namespace App\Kernel\Container;

use App\Kernel\Router\Router;
use App\Kernel\http\Request;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public readonly View $view;

    public readonly Validator $validator;

    public function __construct()
    {
        $this->registerServices();
    }
    // региструем все классы нашего приложения которые могут нам пригодиться
    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->router = new Router($this->view, $this->request);
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
    }
}
