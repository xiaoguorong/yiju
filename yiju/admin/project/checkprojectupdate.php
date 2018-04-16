<?php
$pid=$_POST["pid"];
$pname=$_POST["pname"];
$pthumb=$_POST["pthumb"];
$ptype=$_POST["ptype"];
$did=$_POST["did"];
$ppictures=$_POST["ppictures"];
$pdescription=$_POST["pdescription"];
include "../../public/db.php";
$sql="update project set pname='{$pname}',pthumb='{$pthumb}',ppictures='{$ppictures}',did='{$did}'
,ptype='{$ptype}',pdescription='{$pdescription}'where pid=$pid";
$db->query($sql);
if($db->affected_rows===1){
    $msg="修改成功";
    $href="projectlist.php";
}else{
    $msg="修改失败";
    $href="projectupdate.php?id=".$pid;
}
include "../message.php";