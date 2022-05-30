<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<div class="page">
<div class="left-side">Left</div>
<div class="center">
    <div class="profile">Profile</div>

    <?php
    echo $user->getUsername() . "<br>";
    echo $user->getEmail() . "<br>";
    ?>

    <form action="http://localhost:8080/resume" method="get">
        <input type="submit" value="Resume">
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