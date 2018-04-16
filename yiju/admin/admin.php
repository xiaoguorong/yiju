<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <title>xx论坛</title>
</head>
<style>
    .top{
        width: 100%;
        height: 150px;
        border-bottom:1px solid green ;
    }
    .main{
        height: 100%;
        height: 100%;
        flex-grow: 1;
        display: flex;
    }
    html,body{
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    body{
        display: flex;
        flex-direction: column;
    }
    .left{
        width: 200px;
        height: 100%;
        border-right:1px solid green ;
    }
    .left li {
        margin-left: 30px;
        line-height: 50px;
        list-style: none;
    }
    .right{
        height: 100%;
        flex-grow: 1;
    }
    .right iframe{
        height: 100%;
        display: block;
        border:none;
        width: 100%;
    }
</style>
<body>
    <div class="top bg-success">
    <?php
        session_start();
        if(isset($_SESSION["user"])) {
            echo "<div class='text-right text-muted'>欢迎{$_SESSION["user"]}<a href='login/loginout.php' class='text-danger'>退出</a><a href='../index/index.php'>进入前台</a></div>";
    }else{
        $msg="尚未登陆";
        $href="login/login.php";
        include "message.php";
        exit();
        }?>
    <h1 class="text-center">宜居网站后台管理系统</h1>
    </div>
    <div class="main">
        <div class="left bg-success">
            <ul>
                <li><a href="login/updatapass.php" target="main">修改密码</a></li>
                <li><a href="goods/goodslist.php" target="main">商品管理</a></li>
                <li><a href="team/teamlist.php" target="main">团队管理</a></li>
                <li><a href="project/projectlist.php" target="main">项目管理</a></li>
            </ul>
        </div>
        <div class="right">
            <iframe src="" frameborder="0" name="main"></iframe>
        </div>
    </div>
</body>
</html>