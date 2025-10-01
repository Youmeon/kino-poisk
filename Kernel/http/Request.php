<?php

namespace App\Kernel\http;

use App\Kernel\Validator\Validator;

class Request
{
    private Validator $validator;

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
    //функция для вывода нужных данных из post-запроса/get-запроса через ключ (чтобы не выводить всё сразу)
    public function input(string $key, $default = null): mixed //дефолтное значение в случае если не получим какое то значение 
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default; //если в массиве ничего не найдено возвращаем $default, перед этим получаем значене из get
    }

    public function setValidator(Validator $validator): void
    {
        $this->validator = $validator;
    }
    public function validate(array $rules): bool
    {
        $data = [];

        foreach ($rules as $field => $rule) {
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $rules);
    }
    public function errors(): array
    {
        return $this->validator->errors();
    }
}
