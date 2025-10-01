<?php

namespace App\Kernel\Controller;

use App\Kernel\http\Redirect;
use App\Kernel\http\Request;
use App\Kernel\View\View;

abstract class Controller
{
    private View $view;

    private Request $request;

    private Redirect $redirect;

    public function request(): Request
    {
        return $this->request;
    }
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }

    public function view(string $name): void
    {
        $this->view->page($name);
    }

    public function setRedirect(Redirect $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $uri): Redirect
    {
        return $this->redirect;
    }
}
