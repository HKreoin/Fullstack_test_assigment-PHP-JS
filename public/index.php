<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PDO;
use const App\DB;

use App\Router;

use App\Repository\CarRepository;
use App\Repository\CarBrandRepository;
use App\Repository\CarRepairRepository;

use App\Controller\CarController;
use App\Controller\WelcomeController;
use App\Controller\CarBrandController;
use App\Controller\CarRepairController;

$conn = new PDO(DB);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$initFilePath = implode('/', [dirname(__DIR__), 'database/init.sql']);
$initSql = file_get_contents($initFilePath);
$conn->exec($initSql);

$carRepository = new CarRepository($conn);
$carBrandRepository = new CarBrandRepository($conn);
$carRepairRepository = new CarRepairRepository($conn);

$carController = new CarController($carRepository);
$welcomeController = new WelcomeController();
$carBrandController = new CarBrandController($carBrandRepository);
$carRepairController = new CarRepairController($carRepairRepository);


$router = new Router();
$router->addRoute('GET', '/', $welcomeController, 'index');
$router->addRoute('GET', '/cars', $carController, 'index');
$router->addRoute('GET', '/car-brands', $carBrandController, 'index');
$router->addRoute('GET', '/car-repairs', $carRepairController, 'index');

$req = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
echo $router->route($req, $path);
