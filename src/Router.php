<?php

namespace Kreoin\FSApp;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function addRoute($method, $path, $controller, $action)
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
        return '404';
    }
}
