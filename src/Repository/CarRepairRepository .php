<?php

namespace App\Repository;

use PDO;

class CarRepairRepository implements Repository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM car_brands');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
