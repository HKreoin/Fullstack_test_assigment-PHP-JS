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

$conn = null;

$dsn = DRIVER === 'sqlite'
    ? DRIVER . ':' . DB_NAME
    : DRIVER . ':host=' . HOST . ';dbname=' . DB_NAME . ";charset=" . CHARSET;

try {
    $conn = new PDO($dsn, USER, PASS);
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}

$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$initFilePath = implode('/', [dirname(__DIR__), 'database/init_' . DRIVER . '.sql']);
$initSql = file_get_contents($initFilePath);
$conn->exec($initSql);

require_once __DIR__ . '/../routes/web.php';

$req = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
echo Router::route($req, $path);
