<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\Router;

$conn = null;

try {
    $conn = new PDO(DB);
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$initFilePath = implode('/', [dirname(__DIR__), 'database/init.sql']);
$initSql = file_get_contents($initFilePath);
$conn->exec($initSql);

require_once __DIR__ . '/../routes/web.php';

$req = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
echo Router::route($req, $path);
