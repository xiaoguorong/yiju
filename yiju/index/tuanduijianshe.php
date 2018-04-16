<?php
include "header.php";
include  "../public/db.php";
$sql="select * from team where tposition='设计师'";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$sqlsql="select * from team where tposition='a'";
$rr=$db->query($sqlsql);
$arrarr=$rr->fetch_all(MYSQLI_ASSOC);
$sqlsqlsqlsql="select count(*)as total from team";
$rrrr=$db->query($sqlsqlsqlsql);
$arrarrarrarr=$rrrr->fetch_array(MYSQLI_ASSOC);
$count=$arrarrarrarr["total"];
$pages=ceil($count/4);
$str="";
if(isset($_GET["p"])){
    $p=$_GET["p"];
}else{
    $p=0;
}
for($i=0;$i<$pages;$i++){
    $n=$i+1;
    if($i==$p){
        $str.="<span class='lunbo1 lunbo2'>$n</span>";
    }else{
        $str.="<a class='lunbo1' href='tuanduijianshe.php?p=$i'>$n</a>";
    }
}
$num=$p*4;
$sqlsqlsql="select * from team limit $num,4";
$rrr=$db->query($sqlsqlsql);
$arrarrarr=$rrr->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" type="text/css" href="../static/css/tuanduijianshe.css">
	<!-- banner开始 -->
	<div class="banner">
		<div class="banner1">
			<div class="yizi">
				<img src="../static/img/yizi3.png">
			</div>
			<h1>TEAM TO INTRODUCE</h1>
			<div class="banner_line1"></div>
			<p>团队介绍</p>
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
				<a href="tuanduijianshe.php">
					<div class="bread1_ledt_line"></div>
					<p>团队介绍<br><i>TEAM TO INTRODUCE</i></p>
				</a>
			</div>
			<img src="../static/img/shafa.png">
			<div class="bread1_huang"></div>
		</div>
	</div>

	<!-- 团队介绍开始 -->
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>团&nbsp;&nbsp;&nbsp;&nbsp;队&nbsp;&nbsp;&nbsp;&nbsp;介&nbsp;&nbsp;&nbsp;&nbsp;绍</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="team_bottom">
		<div class="team_bottom1">
			<div class="team_bottom1_left">
				<p>COMMERCIAL SPACE TEAM</p>
				<h1>室内设计团队</h1>
			</div>
			<div class="team_bottom1_right">
				<ul class="team_bottom1_right_ul">
                    <?php foreach ($arr as $v):?>
					<li>
						<img src="../upload/<?php echo $v['tthumb'];?>">
						<div class="team_bottom1_right_name">
							<span><?php echo $v["tename"];?></span>
							<h1><?php echo $v["tname"];?></h1>
							<div class="hui"></div>
							<div class="hei"></div>
							<p><?php echo $v["tposition"];?></p>
						</div>
					</li>
                    <?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="team_bottom1 team_bottom2">
			<div class="team_bottom1_right">
				<ul class="team_bottom1_right_ul">
                    <?php foreach ($arrarr as $v):?>
					<li>
                        <img src="../upload/<?php echo $v['tthumb'];?>">
						<div class="team_bottom1_right_name">
							<span><?php echo $v["tename"];?></span>
							<h1><?php echo $v["tname"];?></h1>
							<div class="hui"></div>
							<div class="hei"></div>
							<p><?php echo $v["tposition"];?></p>
						</div>
					</li>
                    <?php endforeach;?>
				</ul>
			</div>
			<div class="team_bottom1_left">
				<p>COMMERCIAL SPACE TEAM</p>
				<h1>家居设计团队</h1>
			</div>
		</div>
		<div class="jiaju1">
			<img src="../static/img/team7.png">
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>团&nbsp;&nbsp;&nbsp;&nbsp;队&nbsp;&nbsp;&nbsp;&nbsp;介&nbsp;&nbsp;&nbsp;&nbsp;绍</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="team_bottom">
		<div class="team_bottom3">
			<ul>
                 <?php foreach ($arrarrarr as $v):?>
				<li>
					<div class="touxiang_bg">
						<img src="../upload/<?php echo $v['tthumb'];?>">
					</div>
					<h1><?php echo $v["tename"];?></h1>
					<p><?php echo $v["tdescription"];?></p>
				</li>
                 <?php endforeach;?>
			</ul>
		</div>
		<div class="lunbo">
			<?php echo $str;?>
		</div>
	</div>

<?php
include "footer.php";
?>
	<script src="../static/js/jquery-3.3.1.min.js"></script>
	<script src="../static/js/tuanduijianjie.js"></script>
