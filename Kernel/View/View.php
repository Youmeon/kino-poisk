<?php

namespace App\Kernel\View;

use App\Kernel\Exeptions\ViewNotFoundExeption;

class View
{
    public function page(string $name): void //принимает в качестве строки название страницы
    {
        //берем название файла из папки views pages
        $viewPath = APP_PATH . "/views/pages/$name.php";
        // обрабатываем ошибку неправильного маршрута (к примеру если /home1))
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundExeption("View $name not found");
        }

        // то что указано как 'view' будет являться переменной в home/movies
        extract([
            'view' => $this
        ]);

        include_once $viewPath;
    }
    public function component(string $name): void //принимает в качестве строки название страницы
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Component $name not found";
            return; // чтобы не было warning
        }
        include_once APP_PATH . "/views/components/$name.php"; //берем название файла из папки views pages
    }
}
