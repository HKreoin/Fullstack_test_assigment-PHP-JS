<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
require_once __DIR__ . '/../database/config.php';

use App\Router;

require_once __DIR__ . '/../routes/web.php';

$req = $_SERVER['REQUEST_METHOD'];
$path = explode('?', $_SERVER['REQUEST_URI'])[0];
$query = explode('?', $_SERVER['REQUEST_URI'])[1];
Router::route($req, $path);
