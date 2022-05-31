<?php

namespace app\models;

use app\core\Model;
//user_id = :user_id, telegram = :telegram, phone = :phone, skills = :skills, experience = :experience, education = :education, courses = :courses
class Resume extends Model
{
    private int $user_id;
    private string $telegram;
    private string $phone;
    private string $skills;
    private string $experience;
    private string $education;
    private string $courses;
    private string $projects;

    /**
     * @param int $userId
     * @param string $telegram
     * @param string $phone
     * @param string $skills
     * @param string $experience
     * @param string $education
     * @param string $courses
     * @param string $projects
     */
    public function __construct(int $userId, string $telegram, string $phone, string $skills, string $experience, string $education, string $courses, string $projects, int $id = null)
    {
        parent:: __construct($id);
        $this->user_id = $userId;
        $this->telegram = $telegram;
        $this->phone = $phone;
        $this->skills = $skills;
        $this->experience = $experience;
        $this->education = $education;
        $this->courses = $courses;
        $this->projects = $projects;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTelegram(): string
    {
        return $this->telegram;
    }

    /**
     * @param string $telegram
     */
    public function setTelegram(string $telegram): void
    {
        $this->telegram = $telegram;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getSkills(): string
    {
        return $this->skills;
    }

    /**
     * @param string $skills
     */
    public function setSkills(string $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return string
     */
    public function getExperience(): string
    {
        return $this->experience;
    }

    /**
     * @param string $experience
     */
    public function setExperience(string $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return string
     */
    public function getEducation(): string
    {
        return $this->education;
    }

    /**
     * @param string $education
     */
    public function setEducation(string $education): void
    {
        $this->education = $education;
    }

    /**
     * @return string
     */
    public function getCourses(): string
    {
        return $this->courses;
    }

    /**
     * @param string $courses
     */
    public function setCourses(string $courses): void
    {
        $this->courses = $courses;
    }

    /**
     * @return string
     */
    public function getProjects(): string
    {
        return $this->projects;
    }

    /**
     * @param string $projects
     */
    public function setProjects(string $projects): void
    {
        $this->projects = $projects;
    }

}