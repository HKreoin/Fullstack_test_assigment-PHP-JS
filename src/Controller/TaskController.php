<?php

namespace App\Controller;

use App\Controller\Controller;

class TaskController implements Controller
{
    private $repository;
    public function __construct($repository = null)
    {
        $this->repository = $repository;
    }
    public function index() {}

    public function task1()
    {
        $cars = $this->repository->task1();
        require_once __DIR__ . '/../../views/pages/tasks/1.php';
    }

    public function task2()
    {
        $carRepairs = $this->repository->task2();
        require_once __DIR__ . '/../../views/pages/tasks/2.php';
    }

    public function task3()
    {
        $sortedCars = $this->repository->task3();
        require_once __DIR__ . '/../../views/pages/tasks/3.php';
    }
}
