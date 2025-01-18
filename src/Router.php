<?php

namespace App;

use App\Controller\Controller;

class Router
{
    private static $routes = [];

    public static function addRoute(string $method, string  $path, Controller $controller, string $action)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public static  function route($method, $path)
    {
        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $controller = $route['controller'];
                return $controller->{$route['action']}();
            }
        }
        header('HTTP/1.1 404 Not Found');
        return '404 | Not Found';
    }
}
