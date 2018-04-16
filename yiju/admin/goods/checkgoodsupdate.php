<?php
$gid=$_POST["gid"];
$gname=$_POST["gname"];
$gename=$_POST["gename"];
$gthumb=$_POST["gthumb"];
$gpictures=$_POST["gpictures"];
$gdescripts=$_POST["gdescripts"];
include "../../public/db.php";
$sql="update goods set gname='{$gname}',
gename='{$gename}',gthumb='{$gthumb}',gpictures='{$gpictures}'
,gdescripts='{$gdescripts}'where gid=$gid";
$db->query($sql);
if($db->affected_rows===1){
    $msg="修改成功";
    $href="goodslist.php";
}else{
    $msg="修改失败";
    $href="goodsupdate.php?id=".$gid;
}
include "../message.php";