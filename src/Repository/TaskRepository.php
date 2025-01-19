<?php

namespace App\Repository;

use PDO;
use App\Repository\Repository;

class TaskRepository implements Repository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM cars');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function task1()
    {
        $query = <<<SQL
        SELECT
            cb.name AS brand_name,
            c.model,
            c.end_date
        FROM cars c
        JOIN car_brands cb
        ON c.brand_id = cb.id
        WHERE c.end_date IS NOT NULL
        AND c.end_date < '2018-09-01';
        SQL;
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function task2()
    {
        $query = <<<SQL
        SELECT
            cb.name AS brand_name,
            c.model,
            cr.repair_type,
            cr.cost AS repair_cost
        FROM cars c
        JOIN car_brands cb
        ON c.brand_id = cb.id
        JOIN car_repairs cr
        ON c.id = cr.car_id
        WHERE (c.end_date IS NULL)
        AND cr.cost > 1000;
        SQL;
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function task3()
    {
        $query = <<<SQL
        SELECT
            c.id,
            cb.name AS brand_name,
            c.model,
            c.body_type,
            c.start_date,
            c.end_date,
            c.image
        FROM cars c
        JOIN car_brands cb
        ON c.brand_id = cb.id
        ORDER BY c.body_type DESC;
        SQL;
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
