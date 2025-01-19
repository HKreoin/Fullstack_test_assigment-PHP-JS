<?php

namespace App\Repository;

use PDO;

interface Repository
{
    public function __construct(PDO $pdo);
    public function getAll(string $id = null): array;
}
