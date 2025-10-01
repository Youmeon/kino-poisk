<?php

namespace App\Kernel\http;

class Redirect
{
    public function to(string $uri)
    {
        header("Location $uri");
        exit;
    }
}
