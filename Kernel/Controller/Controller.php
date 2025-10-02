<?php

namespace App\Kernel\Controller;

use App\Kernel\http\Redirect;
use App\Kernel\http\Request;
use App\Kernel\Session\Session;
use App\Kernel\View\View;

abstract class Controller
{
    private View $view;

    private Request $request;

    private Redirect $redirect;

    private Session $session;

    public function session(): Session
    {
        return $this->session;
    }

    public function setSession(Session $session): void
    {
        $this->session = $session;
    }

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

    public function redirect(string $uri): void
    {
        $this->redirect->to($uri);
    }
}
