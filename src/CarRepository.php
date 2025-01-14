<?php

namespace App;

use PDO;

class CarRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllCars()
    {
        $stmt = $this->pdo->query('SELECT * FROM cars');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
