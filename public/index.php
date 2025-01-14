<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Controllers\CarController;
use App\Controllers\WelcomeController;
use App\CarRepository;
use App\Router;
use PDO;

use const App\DB;

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

$req = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
echo $router->route($req, $path);
