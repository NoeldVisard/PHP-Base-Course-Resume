<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume edit</title>
</head>
<body>
<div class="page">
    <div class="left-side">Left</div>
    <div class="center">
        <div class="profile">Resume edit</div>
        <div class="inline-block">
            <form action="http://localhost:8080/profile" method="get">
                <input type="submit" value="Profile">
            </form>
            <form action="http://localhost:8080/resume" method="get">
                <input type="submit" value="Resume">
            </form>
        </div>
        <?php
        $exist = false;
        if ($resume) {
            $exist = true;
        }
        ?>
        <form action="http://localhost:8080/resumeEdit" method="post">
            <input type="text" name="telegram" placeholder="telegram" value="<?php if ($exist) echo $resume->getTelegram() ?>">
            <input type="text" name="phone" placeholder="phone" value="<?php if ($exist) echo $resume->getPhone() ?>">
            <input type="text" name="skills" placeholder="skills" value="<?php if ($exist) echo $resume->getSkills() ?>">
            <input type="text" name="experience" placeholder="experience" value="<?php if ($exist) echo $resume->getExperience() ?>">
            <input type="text" name="education" placeholder="education" value="<?php if ($exist) echo $resume->getEducation() ?>">
            <input type="text" name="courses" placeholder="courses" value="<?php if ($exist) echo $resume->getCourses() ?>">
            <input type="text" name="projects" placeholder="projects" value="<?php if ($exist) echo $resume->getProjects() ?>">
            <input type="submit" name="resumeEdit" value="Edit resume">
        </form>
    </div>
    <div class="right-side">Right</div>
</div>
</body>

<style>
    body {
        margin: 0;
    }

    .page {
        display: flex;
        /*position: relative;*/
    }

    .left-side {
        position: absolute;
        height: 100%;
        width: 20%;
        background: #AAAAAA;

    }

    .right-side {
        position: absolute;
        height: 100%;
        right: 0;
        width: 20%;
        background: #AAAAAA;
    }

    .center {
        height: 100%;
        margin-left: 20%;
        margin-right: 20%;
        width: 60%;
        text-align: center;
    }

    .profile {

    }
</style>
</html>