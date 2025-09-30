<?php

namespace App\Kernel\http;

class Request
{
    public function __construct(
        public readonly array $get, #публичные, можем читать но изменять не можем
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies,
    ) {}
    public static function createFromGlobals(): self
    {
        return new self(
            $_GET,
            $_POST,
            $_SERVER,
            $_FILES,
            $_COOKIE,
        );
    }

    public function uri(): string
    {
        //убираем лишнюю информацию (указываем некоторую строку и элемент после которого строка будет обрезана)
        return strtok($this->server['REQUEST_URI'], '?');
    }
    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}
