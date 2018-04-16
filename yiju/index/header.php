<?php
$path=$_SERVER["SCRIPT_NAME"];
$pos=strrpos($path,"/");
$name=substr($path,$pos);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宜居时代</title>
    <link rel="icon" href="../static/img/logo.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="../static/css/public.css">
</head>
<body>
<div class="nav">
    <div class="logo">
        <img src="../static/img/logo1.png">
    </div>
    <form class="sousuo">
        <input type="text" class="search">
        <input type="button" class="search_button">
    </form>
    <div class="nav_wenzi">
        <ul>
            <li>
                <a href="index.php" id="<?php if($name=="/index.php"){echo "active";};?>">公司首页
                </a>
            </li>
            <li>
                <a href="gongsijianjie.php" id="<?php if($name=="/gongsijianjie.php"){echo "active";};?>">
                    公司简介
                </a>
            </li>
            <li>
                <a href="chanpinjieshao.php" id="<?php if($name=="/chanpinjieshao.php"||$name=="/chanpin_content.php"){echo "active";};?>">
                    产品中心
                </a>
            </li>
            <li>
                <a href="anlizhanshi.php" id="<?php if($name=="/anlizhanshi.php"){echo "active";};?>">
                    案例展示
                </a>
            </li>
            <li>
                <a href="tuanduijianshe.php"  id="<?php if($name=="/tuanduijianshe.php"){echo "active";};?>">
                    团队介绍
                </a>
            </li>
            <li>
                <a href="guanyuwomen.php" id="<?php if($name=="/guanyuwomen.php"){echo "active";};?>">
                    关于我们
                </a>
            </li>
        </ul>
    </div>
</div>