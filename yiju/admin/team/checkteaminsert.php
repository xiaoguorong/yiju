<?php
$tname=$_GET["tname"];
$tename=$_GET["tename"];
$tthumb=$_GET["tthumb"];
$tposition=$_GET["tposition"];
$tdescription=$_GET["tdescription"];
include "../../public/db.php";
$sql="insert into team(tname,tename,tthumb,tposition,tdescription) values ('{$tname}',
'{$tename}','{$tthumb}','{$tposition}','{$tdescription}')";
$db->query($sql);
if($db->affected_rows===1){
$msg="插入成功";
$href="teamlist.php";
}else{
$msg="插入失败";
$href="teaminsert.php";
}
include "../message.php";