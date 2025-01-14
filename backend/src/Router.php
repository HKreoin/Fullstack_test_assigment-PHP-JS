<?php

namespace App;

use App\Controller\Controller;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function addRoute(string $method, string  $path, Controller $controller, string $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function route($method, $path)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $controller = $route['controller'];
                return $controller->{$route['action']}();
            }
        }
        header('HTTP/1.1 404 Not Found');
        return '404';
    }
}
