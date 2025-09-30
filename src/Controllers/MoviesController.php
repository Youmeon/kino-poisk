<?php

namespace App\Controllers;

use App\Kernel\View\View;

class MoviesController
{
    public static function index(): void
    {
        $view = new View();

        $view->page('movies');
    }
}
