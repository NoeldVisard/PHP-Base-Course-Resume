<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
<div class="page">
    <div id="login-box">
        <div class="left">
            <form action="http://localhost:8080/registration" class="sign-up">
                <input type="submit" name="signup_move_submit" value="Sign me up" />
            </form>
            <form action="http://localhost:8080/login" class="log-in">
                <input type="submit" name="login_move_submit" value="Log me in" />
            </form>
        </div>
        <div class="or">OR</div>
        <div class="right"></div>
    </div>
</div>
</body>
<style>

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
    *:focus {
        outline: none;
    }

    body {
        margin: 0;
        padding: 0;
        background: #DDD;
        font-size: 16px;
        color: #222;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
    }

    #login-box {
        position: relative;
        margin: 5% auto;
        width: 600px;
        height: 400px;
        background: #FFF;
        border-radius: 2px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .left {
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        padding: 40px;
        width: 300px;
        height: 400px;
    }

    h1 {
        margin: 0 0 20px 0;
        font-weight: 300;
        font-size: 28px;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 4px;
        width: 220px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-bottom: 2px solid #16a085;
        color: #16a085;
        transition: 0.2s ease;
    }

    input[type="submit"] {
        margin-top: 28px;
        width: 120px;
        height: 32px;
        background: #4c59dc;
        border: none;
        border-radius: 2px;
        color: #FFF;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        text-transform: uppercase;
        transition: 0.1s ease;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
        opacity: 0.8;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        transition: 0.1s ease;
    }

    input[type="submit"]:active {
        opacity: 1;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
        transition: 0.1s ease;
    }

    .sign-up {
        position: absolute;
        top: 60px;
        left: 92px;
    }

    .log-in {
        position: absolute;
        bottom: 60px;
        left: 92px;
    }

    .or {
        position: absolute;
        top: 180px;
        left: 130px;
        width: 40px;
        height: 40px;
        background: #DDD;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        line-height: 40px;
        text-align: center;
    }

    .right {
        position: absolute;
        top: 0;
        right: 0;
        box-sizing: border-box;
        padding: 40px;
        width: 300px;
        height: 400px;
        background: url("/view/assets/background.jpg");
        background-size: cover;
        background-position: center;
        border-radius: 0 2px 2px 0;
    }

    .right {
        display: block;
        margin-bottom: 40px;
        font-size: 28px;
        color: #FFF;
        text-align: center;
    }

</style>
</html>