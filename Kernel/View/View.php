<?php

namespace App\Kernel\View;

class View
{
    public function page(string $name): void //принимает в качестве строки название страницы
    {
        include_once APP_PATH . "/views/pages/$name.php"; //берем название файла из папки views pages
    }
}
