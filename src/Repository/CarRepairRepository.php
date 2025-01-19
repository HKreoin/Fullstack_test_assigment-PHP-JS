<?php

namespace App\Repository;

use PDO;

class CarRepairRepository implements Repository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(string $id = null): array
    {
        $stmt = $this->pdo->query('SELECT * FROM car_repairs');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
