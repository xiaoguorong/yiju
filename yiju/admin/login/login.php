<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    form{
        width: 300px;
        height: 300px;
        margin: auto;
        margin-top: 150px;
    }
    li{
        list-style: none;
    }
    img{
        margin-top: 5px;
    }
    input{
        width: 175px;
        display: block;
        margin-bottom: 5px;
    }
</style>
<body>
<form action="checkloginin.php" method="post">
    <ul>
        <li><input name="user" type="text" placeholder="账号" required></li>
        <li><input name="pass1" type="password" placeholder="密码" required></li>
        <li>
            <input name="code" id="code" type="text" placeholder="请输入验证码" required>
            <img src="code.php" alt="" onclick="this.src='code.php?t='+new Date().getTime()">
        </li>
        <li><input type="submit" placeholder="登录""></li>
    </ul>
</form>
</body>
</html>