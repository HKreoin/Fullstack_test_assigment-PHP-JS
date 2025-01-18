<?php

use App\Router;
use App\Repository\CarRepository;
use App\Repository\CarBrandRepository;
use App\Repository\CarRepairRepository;

use App\Controller\CarController;
use App\Controller\WelcomeController;
use App\Controller\CarBrandController;
use App\Controller\CarRepairController;

$carRepository = new CarRepository($conn);
$carBrandRepository = new CarBrandRepository($conn);
$carRepairRepository = new CarRepairRepository($conn);

$carController = new CarController($carRepository);
$welcomeController = new WelcomeController();
$carBrandController = new CarBrandController($carBrandRepository);
$carRepairController = new CarRepairController($carRepairRepository);

Router::addRoute('GET', '/', $welcomeController, 'index');
Router::addRoute('GET', '/cars', $carController, 'index');
Router::addRoute('GET', '/cars/brands', $carBrandController, 'index');
Router::addRoute('GET', '/cars/repairs', $carRepairController, 'index');
