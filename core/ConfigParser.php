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
                [$key, $value] = explode(':', $line);
                $value = substr($value, 0, -1);
//                echo '$key:' . $key . ' $value: ' . $value . '<br>';

                $isValueValid = true;
                $isKeyValid = true;
                // TODO: Create function *isValueString*. Use here, in 40-48 lines. In future, when i will redo second if, change logic also.
                if ($value[0] === "\"" && $value[strlen($value) - 1] === "\"") {
                    $value = substr($value, 1);
                    $value = substr($value, 0, -1);
                }

                if (count(explode('=', $key)) === 2) {
                    [$newKey, $newValue] = explode('=', $key);
                    $_SERVER[$newKey] = $newValue;
                    $_ENV[$newKey] = $newValue;
                    putenv("{$newKey}={$newValue}");
                    $isKeyValid = false;
                }

                if (count(explode(';', $value)) > 1) {
                    $keysValues = explode(';', $value);
                    foreach ($keysValues as $keyValue) {
                        [$newKey, $newValue] = explode('=', $keyValue);
                        $_SERVER[$newKey] = $newValue;
                        $_ENV[$newKey] = $newValue;
                        putenv("{$newKey}={$newValue}");
                    }
                    $isValueValid = false;
                }

                if ($isKeyValid && $isValueValid) {
                    $_SERVER[$key] = $value;
                    $_ENV[$key] = $value;
                    putenv("{$key}={$value}");
                }

//                echo '<br>';
//                echo '$key:' . $key . ' $value: ' . $value . '<br>';
            }
        }
    }
}