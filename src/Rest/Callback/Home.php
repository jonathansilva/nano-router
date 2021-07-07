<?php

namespace App\Rest\Callback;

class Home
{
    public function __invoke()
    {
        echo "This is Callback example";
    }
}
