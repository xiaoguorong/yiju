<?php
include "../../public/db.php";
$sql="select project.*,team.tname from project,team where project.did=team.tid";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach($arr as $v){
    $pics=$v{'ppictures'};
    $arr=explode(";",$pics);
    array_pop($arr);
    $arr=array_slice($arr,0,3);
    $imgs="";
    foreach($arr as $src){
        $imgs.="<img src='../../upload/{$src}'>";
    }
    $des=mb_substr($v["pdescription"],0,10,"utf-8")."…";
    $str.="<tr>    <td>{$v["pname"]}</td>
                    <td><img src='../../upload/{$v["pthumb"]}' alt=''></td>
                    <td>{$imgs}</td>
                    <td>{$des}</td>
                    <td>{$v["tname"]}</td>
                    <td>{$v["ptype"]}</td>
                    <td><a href='projectupdate.php?id={$v["pid"]}' class='btn btn-warning'>修改</a><a href='projectdel.php?id={$v["pid"]}'class='btn btn-danger'>删除</a></td>
                </tr>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
    <title>Document</title>
    <style>
        table tr td{
            vertical-align: middle!important;
        }
        table tr td img{
            width:100px;
            height: 80px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">项目管理</a></li>
</ol>
<div class="col-sm-8">
    <table border="1" class="table table-bordered text-center">
        <tr>
            <td>项目名称</td>
            <td>缩略图</td>
            <td>多图片</td>
            <td>描述</td>
            <td>设计师</td>
            <td>类型</td>
            <td>操作</td>
        </tr>
        <?php
        echo $str;
        ?>
    </table>
    <div class="col-sx-12">
        <a href="projectinsert.php" class="btn btn-large btn-success">添加</a>
    </div>
</div>
</body>
</html>