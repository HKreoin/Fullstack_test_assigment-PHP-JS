<?php

namespace App\Controller;

use App\Repository\Repository;

use App\Controller\Controller;

class CarController implements Controller
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $cars = $this->repository->getAll();
        header('Content-Type: application/json');
        return json_encode($cars);
    }
}
