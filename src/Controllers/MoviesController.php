<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Validator\Validator;
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
        $data = ['name' => ''];
        $rules = ['name' => ['required', 'min:3', 'max:225']];

        $validator = new Validator();

        $validator->validate($data, $rules);

        dd($validator->validate($data, $rules), $validator->errors());
        // dd($this->request());
        // dd('store');
    }
}
