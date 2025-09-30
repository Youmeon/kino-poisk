<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;

class MoviesController extends Controller
{
    public static function index(): void
    {
        $view = new View();

        $view->page('movies');
    }
}
