<?php

namespace app\core;

abstract class DbModel
{
    protected array $fields = [];

    public abstract function getTableName(): string;

    public abstract function getAttributes(): array;

    public function save()
    {
        $tableName = $this->getTableName();
        $attributes = $this->getAttributes();
        $parameters = array_map(fn($attribute) => ":$attribute", $attributes);
        $statement = $this->prepare("INSERT INTO \"$tableName\"(" . implode(", ", $attributes) . ") VALUES(" .
        implode(', ', $parameters) . ")");
        echo "INSERT INTO $tableName (" . implode(", ", $attributes) . ") VALUES (" .
            implode(', ', $parameters) . ")";
        echo $statement->execute($this->fields);
    }

    public function assign(array $body)
    {
        foreach ($body as $key => $value) {
            if (in_array($key, $this->getAttributes(), true)) {
                $this->fields[$key] = $value;
            }
        }
        return $this;
    }

    public function prepare($sql)
    {
        return Application::$app->database->pdo->prepare($sql);
    }

}