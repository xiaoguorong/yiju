<?php
include "header.php";
include "../public/db.php";
//分页效果
//获取总条数
$sql="select count(*) as total from goods";
$rr=$db->query($sql);
$arrarr=$rr->fetch_array(MYSQLI_ASSOC);
$count=$arrarr["total"];
//向上取整
$pages=ceil($count/8);
$pagestr="";
if(isset($_GET["p"])){
    $p=$_GET["p"];
}else{
    $p=0;
}
for($i=0;$i<$pages;$i++){
    $n=$i+1;
    if($i==$p){
        $pagestr.="<span>{$n}</span>";
    }else{
        $pagestr.="<a href='chanpinjieshao.php?p={$i}'>{$n}</a>";
    }
}
$num=$p*8;
$sql="select * from goods limit {$num},8";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" type="text/css" href="../static/css/chanpinjieshao.css">
	<!-- banner开始 -->
	<div class="banner">
		<div class="banner1">
			<h1>PRODUCT CENTER</h1>
			<div class="banner_line1"></div>
			<div class="yizi">
				<img src="../static/img/yizi2.png">
			</div>
			<p>产品中心</p>
		</div>
	</div>

	<!-- 面包屑开始 -->
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
			</div>
			<img src="../static/img/shafa.png">
			<div class="bread1_huang"></div>
		</div>
	</div>

	<!-- 产品中心开始 -->
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>产&nbsp;&nbsp;&nbsp;&nbsp;品&nbsp;&nbsp;&nbsp;&nbsp;中&nbsp;&nbsp;&nbsp;&nbsp;心</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="chanpin_bottom">
		<div class="chanpin_bottom_all">
			<div class="chanpin_bottom_part">
				<ul>
                    <?php
                        foreach($arr as $v):
                    ?>
                        <li>
                            <div class="chanpin_bottom_cover">
                                <h1><?php echo $v["gname"]?></h1>
                                <h2><?php echo $v["gename"]?></h2>
                                <a href="chanpin_content.php?id=<?php echo $v['gid'];?>"><div class="chanpin_bottom_cover_more">+</div></a>
                            </div>
                            <img src="../upload/<?php echo $v['gthumb']?>">
                            <div class="chanpin_bottom_huang"></div>
                        </li>
                    <?php
                        endforeach;
                    ?>
				</ul>
			</div>
		</div>
	</div>
<div class="chanpin_lunbo">
    <p><</p>
    <div class="pagebox">
        <?php echo $pagestr;?>
    </div>
    <p>></p>
</div>


<?php
include "footer.php";
?>
<script src="../static/js/chanpinzhongxin.js"></script>