<?php

namespace App\Router;

class Router
{
    private $request;
    private array $routes;
    private $routeError;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, $callback): void
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function notFound($callback): void
    {
        $this->routeError = $callback;
    }

    private function addRoute(string $method, string $path, $callback): void
    {
        $this->routes[] = [
            "method" => $method,
            "path" => $path,
            "callback" => $callback
        ];
    }

    public function load($path)
    {
        // TODO
    }

    public function start()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = $uri['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $callback = $route['callback'];
            }
        }

        $callback = (!$callback) ? $this->routeError : $callback;

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}
