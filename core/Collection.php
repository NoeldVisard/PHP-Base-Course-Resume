<?php

declare(strict_types=1);

namespace app\core;

class Collection
{
    private int $count;
    private Mapper $mapper;
    private array $rows;
    private array $objects;

    public function __construct(array $rows, Mapper $mapper)
    {
        $this->rows = $rows;
        $this->count = count($rows);
        $this->mapper = $mapper;
    }

    public function getNextRow(): \Generator
    {
        for ($i = 0; $i < $this->count; $i++) {
            yield $this->getRow($i);
        }
    }

    private function getRow(int $rowNumber): ?Model
    {
        if ($rowNumber > $this->count) {
            return null;
        }

        if (isset($this->objects[$rowNumber])) {
            return $this->objects[$rowNumber];
        }

        if (isset($this->rows[$rowNumber])) {
            return $this->mapper->create($this->rows[$rowNumber]);
        }

        return null;
    }
}