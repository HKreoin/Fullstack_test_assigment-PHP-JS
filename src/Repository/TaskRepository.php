<?php

namespace App\Repository;

use PDO;
use App\Repository\Repository;

class TaskRepository implements Repository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(string $id = null): array
    {
        $query1 = <<<SQL
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

        $query2 = <<<SQL
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

        $query3 = <<<SQL
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
        ORDER BY c.body_type;
        SQL;

        $queries = [
            '1' => $query1,
            '2' => $query2,
            '3' => $query3,
        ];

        if (!isset($queries[$id])) {
            return [];
        }
        $stmt = $this->pdo->query($queries[$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
