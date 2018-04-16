<?php
$f=$_FILES["f"];
if(!is_dir("../upload")){
    mkdir("../upload");
}
if(!is_dir("../upload/".date("Y-m-d"))){
    mkdir("../upload/".date("Y-m-d"));
}
$arr=explode(".",$f["name"]);
$ext=array_pop($arr);
$filename=md5(time()+mt_rand(0,1000)).".".$ext;
if(is_uploaded_file($f["tmp_name"])){
    move_uploaded_file($f["tmp_name"],"../upload/".date("Y-m-d")."/".$filename);
}
echo date("Y-m-d")."/".$filename;