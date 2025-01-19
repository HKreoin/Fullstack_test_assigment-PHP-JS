<?php

namespace App;

use PDO;

class Database
{
    private PDO $connection;

    public function __construct($config)
    {
        $this->connect($config);
    }

    public function connect(array $config): void
    {
        extract($config);
        $dsn = $driver === 'sqlite'
            ? $driver . ':' . $dbName
            : $driver . ':host=' . $host . ';dbname=' . $dbName . ";charset=" . $charset;

        try {
            $conn = new PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            exit('Connection failed: ' . $e->getMessage());
        }

        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $initFilePath = implode('/', [dirname(__DIR__), 'database/init_' . $driver . '.sql']);
        $initSql = file_get_contents($initFilePath);
        $conn->exec($initSql);

        $this->connection = $conn;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
