<?php
$id=$_POST["tid"];
$tname=$_POST["tname"];
$tename=$_POST["tename"];
$tthumb=$_POST["tthumb"];
$tposition=$_POST["tposition"];
$tdescription=$_POST["tdescription"];
include "../../public/db.php";
$sql="update team set tname='{$tname}',
tename='{$tename}',tthumb='{$tthumb}',tposition='{$tposition}'
,tdescription='{$tdescription}'where tid=$id";
$db->query($sql);
if($db->affected_rows===1){
    $msg="修改成功";
    $href="teamlist.php";
}else{
    $msg="修改失败";
    $href="teamupdate.php?id=".$id;
}
include "../message.php";