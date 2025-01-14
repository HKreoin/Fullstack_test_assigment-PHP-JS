<?php

namespace App\Controllers;

use App\CarRepository;

class CarController
{
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $cars = $this->carRepository->getAllCars();
        return json_encode($cars);
    }
}
