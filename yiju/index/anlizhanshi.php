<?php
include "header.php";
include "../public/db.php";
//分页效果
//获取总条数
if(isset($_GET["t"])){
    $t=$_GET["t"];
}else{
    $t=1;
}
$sqlsql="select count(*) as total,project.*,team.tthumb,team.tename,team.tposition from project,team where project.did=team.tid and project.ptype={$t}";
$rr=$db->query($sqlsql);
$arrarr=$rr->fetch_array(MYSQLI_ASSOC);
$count=$arrarr["total"];
//向上取整
$pages=ceil($count/9);
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
        $pagestr.="<a href='anlizhanshi.php?t={$t}&p={$i}'>{$n}</a>";
    }
}
$num=$p*9;
$sql="select project.*,team.tthumb,team.tename,team.tposition from project,team where project.did=team.tid and project.ptype={$t} limit {$num},9";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$sql1="select project.pthumb,team.* from project,team where project.did=team.tid limit 0,3";
$r1=$db->query($sql1);
$arr1=$r1->fetch_all(MYSQLI_ASSOC);
$sql2="select project.pthumb,team.* from project,team where project.did=team.tid limit 3,3";
$r2=$db->query($sql2);
$arr2=$r2->fetch_all(MYSQLI_ASSOC);
?>

	<link rel="stylesheet" type="text/css" href="../static/css/anlizhanshi.css">
	<link rel="stylesheet" type="text/css" href="../static/css/chanpinjieshao.css">
	<!-- banner开始 -->
	<div class="banner">
		<div class="banner1">
			<h1>THE CASE SHOWS</h1>
			<div class="banner_line1"></div>
			<div class="yizi">
				<img src="../static/img/yizi2.png">
			</div>
			<p>案例展示</p>
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
				<a href="anlizhanshi.php">
					<div class="bread1_ledt_line"></div>
					<p>案例展示<br><i>THE CASE SHOWS</i></p>
				</a>
			</div>
			<img src="../static/img/shafa.png">
			<div class="bread1_huang"></div>
		</div>
	</div>

	<!-- 成功案例开始 -->
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>成&nbsp;&nbsp;&nbsp;&nbsp;功&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;&nbsp;例</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="chenggong_bottom1">
        <?php foreach ($arr1 as $v):?>
        <div class="chenggong_bottom1_left">
            <img src="../upload/<?php echo $v['pthumb'];?>">
            <div class="chenggong_bottom1_left_bg">
                <img src="../upload/<?php echo $v['tthumb'];?>">
            </div>
            <h1><?php echo $v["tname"];?><i><?php echo $v["tename"];?></i></h1>
            <div class="chenggong_bottom1_left_bottom">
                <div class="chenggong_bottom1_left_bottom_line"></div>
                <p><?php echo $v["tdescription"];?></p>
                <div class="chenggong_bottom1_left_bottom_more">+</div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="chenggong_bottom1 chenggong_bottom2">
        <?php foreach ($arr2 as $v):?>
            <div class="chenggong_bottom1_left">
                <img src="../upload/<?php echo $v['pthumb'];?>">
                <div class="chenggong_bottom1_left_bg">
                    <img src="../upload/<?php echo $v['tthumb'];?>">
                </div>
                <h1><?php echo $v["tname"];?><i><?php echo $v["tename"];?></i></h1>
                <div class="chenggong_bottom1_left_bottom">
                    <div class="chenggong_bottom1_left_bottom_line"></div>
                    <p><?php echo $v["tdescription"];?></p>
                    <div class="chenggong_bottom1_left_bottom_more">+</div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
<!--	<div class="chenggong_fenge">-->
<!--		<div class="chenggong_fenge_left">-->
<!--			<img src="../static/img/chenggong5.png">-->
<!--		</div>-->
<!--		<div class="chenggong_fenge_right">-->
<!--			<p>优秀不是我们的目的／满足你才是我们的目标</p>-->
<!--			<h1>EXCELLENCE IS NOT<br>OUR GOAL</h1>-->
<!--			<h2>TO SATISFY YOU IS OUR GOAL</h2>-->
<!--			<h3>GOIND JASK say __</h3>-->
<!--			<img src="../static/img/chenggong6.png">-->
<!--		</div>-->
<!--	</div>-->

	<!-- 完成案例开始 -->
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>完&nbsp;&nbsp;&nbsp;&nbsp;成&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;&nbsp;例</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="wancheng_bottom">
		<div class="wancheng_bottom1">
			<ul>
                <a href="anlizhanshi.php?t=1&p=<?php echo $p;?>"><li>
					<p>阳台展示</p>
					<div class="wancheng_bottom1_line" id="<?php if($t==1){echo "line_active";}?>">
						<div class="wancheng_bottom1_line1">
						</div>
					</div>
                    </li>
                </a>

				<a href="anlizhanshi.php?t=2"><li class="wancheng_bottom1_li">
					<p>厨房展示</p>
					<div class="wancheng_bottom1_line" id="<?php if($t==2){echo "line_active";}?>">
						<div class="wancheng_bottom1_line2">
						</div>
					</div>
				</li></a>

                <a href="anlizhanshi.php?t=3"><li class="wancheng_bottom1_li">
					<p>客厅展示</p>
					<div class="wancheng_bottom1_line" id="<?php if($t==3){echo "line_active";}?>">
						<div class="wancheng_bottom1_line3">
						</div>
					</div>
                </li></a>
                <a href="anlizhanshi.php?t=4"><li class="wancheng_bottom1_li">
					<p>书房展示</p>
					<div class="wancheng_bottom1_line id="<?php if($t==4){echo "line_active";}?>"">
						<div class="wancheng_bottom1_line4">
						</div>
					</div>
                </li></a>
                <a href="anlizhanshi.php?t=5"><li class="wancheng_bottom1_li">
					<p>卧室展示</p>
					<div class="wancheng_bottom1_line" id="<?php if($t==5){echo "line_active";}?>">
						<div class="wancheng_bottom1_line5">
						</div>
					</div>
                </li></a>
			</ul>
		</div>
        <div class="wancheng_bottom2">
            <ul>
                <?php foreach($arr as $v):?>
                <li>
                    <div class="wancheng1">
                        <img src="../upload/<?php echo $v['pthumb'];?>" alt="">
                    </div>
                    <h1><?php echo $v["pname"];?></h1>
                    <h2><?php echo $str=mb_substr($v['pdescription'],0,5,"utf-8");?></h2>
                    <div>
                        <div class="wancheng1_ren">
                            <img src="../upload/<?php echo $v['tthumb']?>">
                        </div>
                        <p><?php echo $v["tposition"]?></p>
                        <span>&nbsp;/&nbsp;</span>
                        <h3><?php echo $v["tename"]?></h3>
                        <div class="wancheng1_more">+
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <div class="chanpin_lunbo">
        <p><</p>
        <div class="pagebox">
            <?php echo $pagestr;?>
        </div>
        <p>></p>
    </div>
		
	<!-- 站点地图 -->
<?php
include "footer.php";
?>