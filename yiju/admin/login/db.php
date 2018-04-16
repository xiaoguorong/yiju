<?php
header("Content-Type:text/html;charset=utf-8");
$db=new mysqli("localhost","root","","web");
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接错误".$db->connect_error;
    exit();
}