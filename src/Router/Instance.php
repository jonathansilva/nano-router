<?php

namespace App\Router;

use App\Router\Request;

class Instance
{
    public static function create()
    {
        return new Router(new Request());
    }
}
