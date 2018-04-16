<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$oldpass=$_POST["oldpass"];
$newpass=$_POST["newpass"];
include "../../public/db.php";
$sql="SELECT * FROM admin";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
if($arr['password']===$oldpass){
    $sql="update admin set password='{$newpass}'";
    $db->query($sql);
    if($db->affected_rows===1){
        $msg="修改成功";
    }else{
        $mas="修改失败";
    }
}else{
    $msg="原始密码错误";
}
$href="updatapass.php";
include("../message.php");