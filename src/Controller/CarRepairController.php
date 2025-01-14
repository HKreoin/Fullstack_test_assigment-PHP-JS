<?php

namespace App\Controller;

use App\Repository\Repository;

class CarRepairController implements Controller
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $carBrands = $this->repository->getAll();
        header('Content-Type: application/json');
        return json_encode($carBrands);
    }
}
