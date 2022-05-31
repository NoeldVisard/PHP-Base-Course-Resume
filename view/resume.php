<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume</title>
</head>
<body>
<div class="page">
    <div class="left-side">Left</div>
    <div class="center">
        <div class="profile">Resume</div>
        <div class="inline-block">
            <img src="/view/assets/user.png" alt="user">
            <form action="http://localhost:8080/profile" method="get">
                <input type="submit" value="Profile">
            </form>
            <form action="http://localhost:8080/resumeEditPage" method="get">
                <input type="submit" value="Edit resume">
            </form>
        </div>
        <?php
        if ($resume) {
            echo "<div class='content'>";
            echo "<div class='block'>Telegram: <div class='info'>@" . $resume->getTelegram() . "</div></div>";
            echo "<div class='block'>Phone: <div class='info'>" . $resume->getPhone() . "</div></div>";
            echo "<div class='block'>Skills: <div class='info'>" . $resume->getSkills() . "</div></div>";
            echo "<div class='block'>Experience: <div class='info'>" . $resume->getExperience() . "</div></div>";
            echo "<div class='block'>Education: <div class='info'>" . $resume->getEducation() . "</div></div>";
            echo "<div class='block'>Courses: <div class='info'>" . $resume->getCourses() . "</div></div>";
            echo "<div class='block'>Projects: <div class='info'>" . $resume->getProjects() . "</div></div>";
            echo "</div>";
        } else {
            echo "No resume added";
        }
        ?>
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

    .content {
        text-align: left;
    }

    img {
        width: 100px;
        height: 100px;
        margin: 5px;
    }

    .block {
        padding: 20px;
        background: #e0dede;
        border-top: 2px solid cornflowerblue;
        margin-left: 20px;
        margin-right: 20px;
    }

    .info {
        position: fixed;
        display: inline-block;
        left: 35%;
        color: #696969;
    }
</style>
</html>