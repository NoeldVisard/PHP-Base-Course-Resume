<?php

declare(strict_types=1);

namespace app\core;

use http\Exception\RuntimeException;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger {

    public string $logFile;

    public function __construct($logFile)
    {
        if (!file_exists($logFile)) {
            $directory = dirname($logFile);
            $status = mkdir($directory, 0777, true);
            if (!$status) {
                throw new RuntimeException();
            }
        }
        $this->logFile = $logFile;
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        file_put_contents($this->logFile, "$level, $message, at " . date('Y-m-d H:i:s') . PHP_EOL);
    }
}

