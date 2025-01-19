<?php

namespace App;

use App\Controller\Controller;

class Router
{
    private static $routes = [];

    public static function addRoute(
        string $method,
        string $path,
        Controller $controller,
        string $action
    ): void {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public static function route(string $method, string $uri): void
    {
        $path = '/' . explode('/', $uri)[1];
        $id = explode('/', $uri)[2];

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $controller = $route['controller'];
                echo $controller->{$route['action']}($id);
                return;
            }
        }
        header('HTTP/1.1 404 Not Found');
        $errorMessage = '404 | Page not found' . PHP_EOL . $path . PHP_EOL . $id;
        require_once __DIR__ . '/../views/pages/errors/404.php';
    }
}
