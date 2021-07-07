<?php

require_once __DIR__.'/../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$app = App\Router\Instance::create();

$app->notFound(function () {
    echo "Not Found";
});

$app->get('/', function() {
    echo "Home";
});

$app->get('/teste', function() {
    echo "Teste";
});

//$app->load(__DIR__.'/../src/routes.xml');

$app->start();
