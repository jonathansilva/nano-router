<?php

namespace App\Rest\Middleware;

class TestMiddleware
{
    public function __invoke()
    {
        echo "This is Middleware example";
    }
}
