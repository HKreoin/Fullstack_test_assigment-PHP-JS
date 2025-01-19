<?php

namespace App\Controller\Api;

use App\Controller\Controller;
use App\Repository\Repository;

class CarController implements Controller
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(string $id = null): ?string
    {
        $cars = $this->repository->getAll();
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        return json_encode($cars);
    }
}
