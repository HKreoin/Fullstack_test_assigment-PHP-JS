<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use const Kreoin\FSApp\DB;

$conn = new PDO(DB);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$initFilePath = implode('/', [dirname(__DIR__), 'database/init.sql']);

$initSql = file_get_contents($initFilePath);

$conn->exec($initSql);

$query = 'SELECT * FROM cars';

$stmt = $conn->query($query);

while ($row = $stmt->fetch()) {
    echo json_encode($row) . PHP_EOL;
}
