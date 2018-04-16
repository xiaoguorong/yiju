<?php
$gname=$_GET["gname"];
$gename=$_GET["gename"];
$gthumb=$_GET["gthumb"];
$gpictures=$_GET["gpictures"];
$gdescripts=$_GET["gdescripts"];
include "../../public/db.php";
$sql="insert into goods(gname,gename,gthumb,gpictures,gdescripts) values ('{$gname}',
'{$gename}','{$gthumb}','{$gpictures}','{$gdescripts}')";
$db->query($sql);
if($db->affected_rows===1){
    $msg="插入成功";
    $href="goodslist.php";
}else{
    $msg="插入失败";
    $href="goodsinsert.php";
}
include "../message.php";