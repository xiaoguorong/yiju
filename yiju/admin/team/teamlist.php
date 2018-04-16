<?php
include "../../public/db.php";
$sql="SELECT * FROM team";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach($arr as $v){
    $des=mb_substr($v["tdescription"],0,10,"utf-8")."...";
    $str.="<tr>
           <td>{$v["tname"]}</td>
           <td>{$v["tename"]}</td>
           <td>{$v["tposition"]}</td>
           <td><img src='../../upload/{$v['tthumb']}' alt=''></td>
           <td>{$des}</td>
           <td><a href='teamupdate.php?id={$v["tid"]}' class='btn btn-warning'>修改</a>
           <a href='teamdel.php?id={$v["tid"]}'class='btn btn-danger del'>删除</a></td>
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
            width: 100px;
            height: 80px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">团队管理</a></li>
</ol>
<div class="col-sm-8">
    <table border="1" class="table table-bordered text-center">
        <tr>
            <td>姓名</td>
            <td>英文名称</td>
            <td>职位</td>
            <td>缩略图</td>
            <td>描述</td>
            <td>操作</td>
        </tr>
        <?php
        echo $str;
        ?>
    </table>
    <div class="col-sx-12">
        <a href="teaminsert.php" class="btn btn-large btn-success">添加</a>
    </div>
</div>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $(".del").click(function(e){
        if(!confirm("确定删除吗？")){
            e.preventDefault();//阻止浏览器默认行为
        }
    })
</script>
</body>
</html>