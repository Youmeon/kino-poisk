<?php


namespace App;

// создаём класс Route, каждый объект этого класса будет хранить информацию об одном URL
class Route
{
    public function __construct(
        private string $uri,        //private объявляет свойства класса и присваивает им значение (элементы маршрута)
        private string $method,
        private $action
    ) {}

    // метод вызывается на классе, а не на объекте. Принимает $url и $action(обработчик маршрута) 
    // возвращает new static (создаёт новый объект текущего класса)
    // нужны для удобного создания маршрутов
    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action);
    }

    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function getUri(): string
    {
        return $this->uri;
    }
}
