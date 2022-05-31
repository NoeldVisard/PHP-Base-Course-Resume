<?php

namespace app\services;

use app\core\Model;
use app\mappers\ResumeMapper;

class ResumeServices
{
    public function editResume(string $telegram, string $phone, string $skills, string $experience, string $education, string $courses, string $projects): Model
    {
        $resumeMapper = new ResumeMapper();
        $oldResume = $resumeMapper->findByUserId($_COOKIE['PHP_AUTH_USER_ID']);
        if ($oldResume) {
            $newResume = $resumeMapper->create(
                [
                    'id' => $oldResume->getId(),
                    'user_id' => $oldResume->getUserId(),
                    'telegram' => $telegram,
                    'phone' => $phone,
                    'skills' => $skills,
                    'experience' => $experience,
                    'education' => $education,
                    'courses' => $courses,
                    'projects' => $projects
                ]
            );
            $resumeMapper->update($newResume);
        } else {
            $newResume = $resumeMapper->create(
                [
                    'user_id' => $_COOKIE['PHP_AUTH_USER_ID'],
                    'telegram' => $telegram,
                    'phone' => $phone,
                    'skills' => $skills,
                    'experience' => $experience,
                    'education' => $education,
                    'courses' => $courses,
                    'projects' => $projects
                ]
            );
            return $resumeMapper->insert($newResume);
        }
        return $newResume;
    }
}