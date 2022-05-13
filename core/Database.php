<?php

namespace app\core;

use PDO;
use PDOException;
use Psr\Log\LogLevel;

class Database
{
    public PDO $pdo;

    /**
     * @param string $DB_DSN
     * @param string $DB_USER
     * @param string $DB_PASSWORD
     */
    public function __construct(string $DB_DSN, string $DB_USER, string $DB_PASSWORD)
    {
        try {
            $this->pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            Application::$app->logger->log(LogLevel::ERROR, $e->getMessage());
        }
    }
}