<?php

namespace app\models;

use app\core\Model;

class Task extends Model
{
    private string $text;
    private int $userId;

    /**
     * @param string $text
     * @param int $userId
     */
    public function __construct(string $text, int $userId, int $id = null)
    {
        parent:: __construct($id);
        $this->text = $text;
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

}