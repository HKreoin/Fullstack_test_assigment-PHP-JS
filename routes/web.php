<?php

use App\Router;
use App\Repository\CarRepository;
use App\Repository\CarBrandRepository;
use App\Repository\CarRepairRepository;
use App\Repository\TaskRepository;
use App\Controller\WelcomeController;
use App\Controller\TaskController;
use App\Controller\Api\CarController;
use App\Controller\Api\CarBrandController;
use App\Controller\Api\CarRepairController;
use App\Database;

$db = new Database($db_config);
$conn = $db->getConnection();

$carRepository = new CarRepository($conn);
$carBrandRepository = new CarBrandRepository($conn);
$carRepairRepository = new CarRepairRepository($conn);
$TaskRepository = new TaskRepository($conn);

$carController = new CarController($carRepository);
$welcomeController = new WelcomeController();
$carBrandController = new CarBrandController($carBrandRepository);
$carRepairController = new CarRepairController($carRepairRepository);
$TaskController = new TaskController($TaskRepository);

Router::addRoute('GET', '/', $welcomeController, 'index');
Router::addRoute('GET', '/cars', $carController, 'index');
Router::addRoute('GET', '/cars/brands', $carBrandController, 'index');
Router::addRoute('GET', '/cars/repairs', $carRepairController, 'index');
Router::addRoute('GET', '/tasks', $TaskController, 'index');
