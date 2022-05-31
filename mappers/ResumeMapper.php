<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\Resume;

class ResumeMapper extends Mapper
{
    private \PDOStatement $update;
    private \PDOStatement $delete;
    private \PDOStatement $insert;
    private \PDOStatement $find;
    private \PDOStatement $findAll;

    private \PDOStatement $findByUserId;

    /**
     * @param \PDOStatement $update
     * @param \PDOStatement $delete
     * @param \PDOStatement $insert
     * @param \PDOStatement $find
     * @param \PDOStatement $findAll
     * @param \PDOStatement $findByUserId
     */
    public function __construct()
    {
        parent:: __construct();
        $this->update = $this->getPdo()->prepare("UPDATE resume SET user_id = :user_id, telegram = :telegram, phone = :phone, skills = :skills, experience = :experience, education = :education, courses = :courses WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM resume WHERE id = :id");
        $this->insert = $this->getPdo()->prepare("INSERT INTO resume (user_id, telegram, phone, skills, experience, education, courses) VALUES (:user_id, :telegram, :phone, :skills, :experience, :education, :courses)");
        $this->find = $this->getPdo()->prepare("SELECT * FROM resume WHERE  id = :id");
        $this->findAll = $this->getPdo()->prepare("SELECT * FROM resume");

        $this->findByUserId = $this->getPdo()->prepare("SELECT * FROM resume WHERE user_id = :user_id");
    }


    protected function doInsert(Model $object): Model
    {
        $this->insert->execute(
            [
                'user_id' => $object->getUserId(),
                'telegram' => $object->getTelegram(),
                'phone' => $object->getPhone(),
                'skills' => $object->getSkills(),
                'experience' => $object->getExperience(),
                'education' => $object->getEducation(),
                'courses' => $object->getCourses()
            ]
        );

        $rowId = $this->getPdo()->lastInsertId();
        $object->setId((int) $rowId);
        return $object;
    }

    protected function doUpdate(Model $object): Model
    {
        try {
            $this->update->execute(
                [
                    'id' => $object->getId(),
                    'user_id' => $object->getUserId(),
                    'telegram' => $object->getTelegram(),
                    'phone' => $object->getPhone(),
                    'skills' => $object->getSkills(),
                    'experience' => $object->getExperience(),
                    'education' => $object->getEducation(),
                    'courses' => $object->getCourses()
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return $object;
    }

    protected function doDelete(Model $object): void
    {
        try {
            $this->delete->execute(
                [
                    'id' => $object->getId()
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function doCreate(array $object): Model
    {
        return new Resume(
            $object['user_id'],
            $object['telegram'],
            $object['phone'],
            $object['skills'],
            $object['experience'],
            $object['education'],
            $object['courses'],
            $object['projects'],
            $object['id']
        );
    }

    protected function select(): \PDOStatement
    {
        return $this->find;
    }

    protected function selectAll(): \PDOStatement
    {
        return $this->findAll;
    }

    protected function getMapper(): Mapper
    {
        return $this;
    }

    public function findByUserId(int $id): ?Model
    {
        $this->findByUserId->execute(
            [
                'user_id' => $id
            ]
        );
        $row = $this->findByUserId->fetch();

        if (!is_array($row)) {
            return null;
        } elseif (!isset($row['id'])) {
            return null;
        } else {
            return $this->create($row);
        }
    }
}