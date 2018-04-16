<?php
$pname=$_GET["pname"];
$pthumb=$_GET["pthumb"];
$ppictures=$_GET["ppictures"];
$pdescription=$_GET["pdescription"];
$did=$_GET["did"];
$ptype=$_GET["ptype"];
include "../../public/db.php";
$sql="insert into project(pname,pthumb,ppictures,pdescription,did,ptype) values (
'{$pname}','{$pthumb}','{$ppictures}','{$pdescription}','{$did}','{$ptype}')";
$db->query($sql);
if($db->affected_rows===1){
    $msg="插入成功";
    $href="projectlist.php";
}else{
    $msg="插入失败";
    $href="projectinsert.php";
}
include "../message.php";