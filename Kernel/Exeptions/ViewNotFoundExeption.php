<?php
// папка Exeptions создана для того чтобы добавлять классы и обработкой ошибок (выводом исключений)
namespace App\Kernel\Exeptions;

class ViewNotFoundExeption extends \Exception // наследование от Exception
{}
