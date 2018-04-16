<?php
//关于图像函数
header("Content-Type:image/png");
//创建一个画板
$width=180;
$height=40;
$image=imagecreatetruecolor($width,$height);
//添加颜色
//创建颜色
function getcolor($type="l"){
    global $image;
    if($type==="l"){
        return imagecolorallocate($image,mt_rand(120,255),mt_rand(120,255),mt_rand(120,255));
    }else{
        return imagecolorallocate($image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
    }
}
//填充颜色
imagefill($image,0,0,getcolor());
//添加线条
for($i=0;$i<10;$i++){
    imageline($image,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),getcolor());
}
//添加点
for($i=0;$i<10;$i++){
    imagesetpixel($image,mt_rand(0,$width),mt_rand(0,$height),getcolor());
}
//添加字母
$str="wertyupasdfghjkzxcvbnm23456789WERTYUPLKJHGFDSAZXCVBNM";
session_start();
$code="";
$len=strlen($str);
for($i=0;$i<4;$i++){
    $pos=mt_rand(0,$len-1);
    $letter=substr($str,$pos,1);
    $code.=strtoupper($letter);
    imagettftext($image,mt_rand(20,30),mt_rand(-15,15),$i*40,mt_rand(30,40),getcolor("d"),"font.TTF",$letter);
}
$_SESSION["code"]=$code;
//用当前的图像资源生成一张图片
imagepng($image);
imagedestroy($image);//销毁资源，释放内存
