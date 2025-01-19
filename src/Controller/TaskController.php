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
        require_once __DIR__ . "/../../views/pages/tasks/{$id}.php";
    }
}
