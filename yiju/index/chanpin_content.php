<?php
include "header.php";
include "../public/db.php";
$id=$_GET["id"];
$sql="select * from goods where gid=$id";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
$pics=$arr{'gpictures'};
$imgarr=explode(";",$pics);
array_pop($imgarr);
$imgs="";
foreach($imgarr as $src){
    $imgs.="<img src='../upload/{$src}'>";
}
?>
<style>
    .gthumb img{
        width: 100%;
        height: auto;
    }
    .gpictures img{
        width: 60px;
    }
    .show{
        border:2px dashed #398439;
        border-radius: 15px;
        padding: 20px;
        width: 350px;
        margin:50px auto!important;
    }
</style>
<div class="banner">
    <div class="banner1">
        <h1><?php echo $arr["gename"];?></h1>
        <div class="banner_line1"></div>
        <div class="yizi">
            <img src="../static/img/yizi2.png">
        </div>
        <p><?php echo $arr["gname"];?></p>
    </div>
</div>
<div class="bread">
    <div class="bread1">
        <div class="bread1_left">
            <a href="index.php">
                <div class="bread1_ledt_line"></div>
                <p>首页<br><i>HOME</i></p>
            </a>
            <div class="bread1_left_shenglue"></div>
            <div class="bread1_left_shenglue bread1_left_shenglue1"></div>
            <div class="bread1_left_shenglue bread1_left_shenglue2"></div>
            <a href="chanpinjieshao.php">
                <div class="bread1_ledt_line"></div>
                <p>产品中心<br><i>PRODUCT CENTER</i></p>
            </a>
            <div class="bread1_left_shenglue"></div>
            <div class="bread1_left_shenglue bread1_left_shenglue1"></div>
            <div class="bread1_left_shenglue bread1_left_shenglue2"></div>
            <a href="chanpin_content.php">
                <div class="bread1_ledt_line"></div>
                <p><?php echo $arr["gname"];?><br><i><?php echo $arr["gename"];?></i></p>
            </a>
        </div>
        <img src="../static/img/shafa.png">
        <div class="bread1_huang"></div>
    </div>
</div>
<div class="show">
    <div class="gthumb">
        <img src="../upload/<?php echo $arr['gthumb'];?>">
    </div>
    <div class="gpictures">
        <?php echo  $imgs;?>
    </div>
    <div class="caption">
        <h3><?php echo $arr["gname"];?></h3>
        <h4><?php echo $arr["gename"];?></h4>
        <p><?php echo $arr["gdescripts"];?></p>
    </div>
</div>
<?php
include "footer.php";
?>
<script src="../static/js/chanpinzhongxin.js"></script>