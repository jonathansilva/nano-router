<?php

namespace App\Rest\Callback;

use App\Rest\Service\Login as Service;
use Exception;

class Login
{
    public function __invoke($request)
    {
        try {
            $token = Service::authenticate($data);

            return json_encode(array("status" => 200, "data" => $token));
        } catch(Exception $e) {
            return json_encode(array("status" => 500, "data" => $e->getMessage()));
        }
    }
}
