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
                echo $controller->{$route['action']}();
                return;
            }
        }
        header('HTTP/1.1 404 Not Found');
        require_once __DIR__ . '/../views/pages/errors/404.php';
    }
}
