<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Repository\Repository;

class TaskController implements Controller
{
    private Repository $repository;
    public function __construct(Repository $repository = null)
    {
        $this->repository = $repository;
    }
    public function index(string $id = null): void
    {
        $entities = $this->repository->getAll($id);
        if ($entities) {
            require_once __DIR__ . "/../../views/pages/tasks/{$id}.php";
        } else {
            header('HTTP/1.1 404 Not Found');
            $http = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['REQUEST_URI'];
            $errorMessage = '404 | Page "' . $http . $uri .'" not found';
            require_once __DIR__ . "/../../views/pages/errors/404.php";
        }
    }
}
