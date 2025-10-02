<?php

namespace App\Kernel\Container;

use App\Kernel\Router\Router;
use App\Kernel\http\Request;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;
use App\Kernel\http\Redirect;
use App\Kernel\Session\Session;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public readonly View $view;

    public readonly Validator $validator;

    public readonly Session $session;

    public readonly Redirect $redirect;

    public function __construct()
    {
        $this->registerServices();
    }
    // региструем все классы нашего приложения которые могут нам пригодиться
    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session);
    }
}
