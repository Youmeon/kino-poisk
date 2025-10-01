<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;

class MoviesController extends Controller
{
    public function index(): void
    {
        $this->view('movies');
    }
    public function add(): void
    {
        $this->view('admin/movies/add');
    }
    public function store() // отвечает за сохранение сущности
    {
        dd($this->request());
        dd('store');
    }
}
