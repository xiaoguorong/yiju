<?php
include "header.php";
include "../public/db.php";
$sql="select * from goods limit 0,6";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$sql1="select * from project limit 0,1";
$r1=$db->query($sql1);
$arr1=$r1->fetch_array(MYSQLI_ASSOC);
$pics=$arr1['ppictures'];
$arrimg=explode(";",$pics);
$arrimg=array_slice($arrimg,0,3);
$imgs="";
$i=0;
foreach($arrimg as $src){
    $i++;
    $imgs.="<img class='case_bottom_case{$i}' src='../upload/{$src}'>";
};
$sql2="select * from team limit 0,4";
$r2=$db->query($sql2);
$arr2=$r2->fetch_all(MYSQLI_ASSOC);
$des=mb_substr($arr1["pdescription"],0,20,"utf-8");
$sql3="select pthumb from project order by pid desc limit 0,5";
$r3=$db->query($sql3);
$arr3=$r3->fetch_all(MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="../static/css/index.css">
	<!-- banner开始 -->
	<div class="bannerbanner">
        <?php foreach ($arr3 as $v):?>
		    <img class="lunbotu" src="../upload/<?php echo $v['pthumb'];?>">
        <?php endforeach;?>
		<div class="lunbo">
			<div class="lunbodian">
				1
				<div class="left_top"></div>
				<div class="right_bottom"></div>
			</div>
			<div class="lunbodian lunbodian1">
				2
				<div class="left_top"></div>
				<div class="right_bottom"></div>
			</div>		
			<div class="lunbodian lunbodian2">
				3
			 	<div class="left_top"></div>
				<div class="right_bottom"></div>
			</div>
			<div class="lunbodian lunbodian3">
				4
				<div class="left_top"></div>
				<div class="right_bottom"></div>
			</div>
			<div class="lunbodian lunbodian4">
				5
				<div class="left_top"></div>
				<div class="right_bottom"></div>
			</div>
		</div>
	</div>

	<!-- 产品中心 -->
	<div class="pro">
		<div class="pro_top">
			<p><strong>LIVABLE</strong><br>ERA</p>
			<div class="pro_top_title">产品<br>中心</div>
			<span>SOMETHING<br>YOU<br>
			<h1>DON'T KNOW</h1></span>
		</div>
		<div class="pro_bottom">
            <?php
                foreach($arr as $v):?>
			<div class="pro_bottom1 pro_bottom3">
				<div class="pro_bottom1_cover">
					<div class="pro_bottom1_cover1">
					</div>
					<div class="pro_bottom1_cover2">
						<?php echo $v["gname"]?>
					</div>
					<div class="pro_bottom1_cover3">
						<img src="../static/img/cover1.png">
						<p> ·<?php echo $v["gename"]?>·</p>
						<img src="../static/img/cover1.png">
					</div>
				</div>
				<img src="../upload/<?php echo $v["gthumb"]?>">
			</div>
            <?php endforeach;?>
		</div>
	</div>

	<!-- 案例展示 -->
	<div class="pro case">
		<div class="pro_top">
			<p><strong>LIVABLE</strong><br>ERA</p>
			<div class="pro_top_title">案例<br>展示</div>
			<span>SOMETHING<br>YOU<br>
			<h1>DON'T KNOW</h1></span>
		</div>
		<div class="case_bottom">
			<?php echo $imgs;?>
			<h1><?php echo $arr1["pname"]?><i><?php echo $arr1["pname"]?></i></h1>
			<p><?php echo $des?></p>
			<div class="xiangqing">
                <?php echo $arr1["pdescription"]?>
				<div class="more">
					<span>MORE</span>
					<div class="more_blue">+</div>
				</div>
			</div>
			<div class="black black1">
				<img src="../static/img/jiantou.png">
			</div>
			<div class="black blue">
				<img src="../static/img/jiantou1.png">
			</div>
		</div>
	</div>

	<!-- 团队介绍 -->
	<div class="pro team">
		<div class="pro_top team_top">
			<p><strong>LIVABLE</strong><br>ERA</p>
			<div class="pro_top_title">团队<br>介绍</div>
			<span>SOMETHING<br>YOU<br>
			<h1>DON'T KNOW</h1></span>
		</div>
		<div class="team_bottom">
			<div class="team_bottom_bg">
				<img src="../static/img/team_bg.png">
			</div>
			<div class="team_tottom1">
				<h1>PROTENA TEAM</h1>
				<div class="more1">
					<span>MORE</span>
					<div class="more_white" >+</div>
				</div>
				<p>项目团队成员来自13个国家顶尖家居行业专家，曾获得国内外多项大奖，承接各类建筑事物，项目资质齐全</p>
				<div class="team_renyuan">
					<ul>
                        <?php
                        foreach($arr2 as $v):?>
						<li>
							<img src="../upload/<?php echo $v["tthumb"]?>">
							<span><?php echo $v["tename"]?></span>
						</li>
                        <?php endforeach;?>
					</ul>
				</div>
				<div class="team_ren"></div>
				<div class="team_ren team_ren_bg"><img src="../static/img/ren.png"></div>
			</div>
		</div>
	</div>

<?php
include "footer.php";
?>
<script src="../static/js/index.js"></script>