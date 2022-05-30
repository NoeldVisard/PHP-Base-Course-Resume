<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Edit</title>
</head>
<body>
<div class="page">
    <div class="left-side">Left</div>
    <div class="center">
        <div class="profile">Profile</div>
        <form action="http://localhost:8080/profileEditController" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="new username" value="<?php echo $user->getUsername() ?>" id="username">
            <label for="password">Password:</label>
            <input type="text" name="password" placeholder="new password" value="<?php echo $user->getPassword() ?>" id="password">
            <input type="submit" name="change_profile" value="Change">
        </form>

        <div class="inline-block">
        </div>
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