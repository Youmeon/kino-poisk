<?php

namespace App\Kernel\http;

class Redirect
{
    public function to(string $url)
    {
        header("Location $url");
        exit;
    }
}
