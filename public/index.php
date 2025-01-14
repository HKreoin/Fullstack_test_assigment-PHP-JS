<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use const Kreoin\FSApp\DB;
use Kreoin\FSApp\CarRepository;
use Kreoin\FSApp\CarController;
use Kreoin\FSApp\WelcomeController;
use Kreoin\FSApp\Router;

$conn = new PDO(DB);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$initFilePath = implode('/', [dirname(__DIR__), 'database/init.sql']);
$initSql = file_get_contents($initFilePath);
$conn->exec($initSql);

$carRepository = new CarRepository($conn);
$carController = new CarController($carRepository);
$welcomeController = new WelcomeController();
$router = new Router();
$router->addRoute('GET', '/cars', $carController, 'index');
$router->addRoute('GET', '/', $welcomeController, 'index');
echo $router->route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
