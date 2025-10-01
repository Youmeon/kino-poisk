<?php

namespace App\Kernel\View;

class View
{
    public function page(string $name): void //принимает в качестве строки название страницы
    {
        $viewPath = APP_PATH . "/views/pages/$name.php";
        // обрабатываем ошибку неправильного маршрута (к примеру если /home1))
        if (!file_exists($viewPath)) {
            throw new \Exception("View $name not found");
        }

        // то что указано как 'view' будет являться переменной в home/movies
        extract([
            'view' => $this
        ]);

        include_once APP_PATH . "/views/pages/$name.php"; //берем название файла из папки views pages
    }
    public function component(string $name): void //принимает в качестве строки название страницы
    {
        extract([
            'view' => $this
        ]);
        include_once APP_PATH . "/views/components/$name.php"; //берем название файла из папки views pages
    }
}
