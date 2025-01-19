<?php

namespace App\Controller\Api;

use App\Controller\Controller;
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
        header('Access-Control-Allow-Origin: *');
        return json_encode($carBrands);
    }
}
