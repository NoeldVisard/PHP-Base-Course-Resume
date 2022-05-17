<?php

declare(strict_types=1);

namespace app\core;

class ConfigParser
{
    private string $configFile;

    public function __construct($configFile)
    {
        $this->configFile = $configFile;
    }

    public function load(): void
    {
        $configFile = file($this->configFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($configFile as $line) {
            if ($line[0] !== '#' && $line[0] !== '{' && $line[0] !== '}') {
                [$key, $value] = explode(':', $line, 2);

                $key = substr($key, 3);
                $key = substr($key, 0, -1);

                if ($value[strlen($value) - 1] === ','){
                    $value = substr($value, 0, -1);
                }

                if ($this->isValueString($value)) {
                    $value = substr($value, 1);
                    $value = substr($value, 0, -1);
                }

                $_SERVER[$key] = $value;
                $_ENV[$key] = $value;
                putenv("{$key}={$value}");
            }
        }
    }

    public function isValueString(string $value): bool
    {
        return ($value[0] === '"' && $value[strlen($value) - 1] === '"');
    }
}