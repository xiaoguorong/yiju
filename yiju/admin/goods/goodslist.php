<?php
    include "../../public/db.php";
    $sql="SELECT * FROM goods";
    $r=$db->query($sql);
    $arr=$r->fetch_all(MYSQLI_ASSOC);
    $str="";
    foreach($arr as $v){
        $pics=$v{'gpictures'};
        $arr=explode(";",$pics);
        array_pop($arr);
        $arr=array_slice($arr,0,3);
        $imgs="";
        foreach($arr as $src){
            $imgs.="<img src='../../upload/{$src}'>";
        }
        $des=mb_substr($v["gdescripts"],0,10,"utf-8")."…";
        $str.="<tr>
                    <td>{$v["gname"]}</td> 
                    <td>{$v["gename"]}</td>
                    <td><img src='../../upload/{$v['gthumb']}' alt=''></td>
                    <td>{$imgs}</td>
                    <td>{$des}</td>
                    <td><a href='goodsupdate.php?id={$v["gid"]}' class='btn btn-warning'>修改</a><a href='goodsdel.php?id={$v["gid"]}'class='btn btn-danger'>删除</a></td>
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
    <li><a href="#">查看商品</a></li>
</ol>
    <div class="col-sm-8">
    <table border="1" class="table table-bordered text-center">
        <tr>
            <td>名称</td>
            <td>英文名称</td>
            <td>缩略图</td>
            <td>多图片</td>
            <td>描述</td>
            <td>操作</td>
        </tr>
        <?php
            echo $str;
        ?>
    </table>
    <div class="col-sx-12">
         <a href="goodsinsert.php" class="btn btn-large btn-success">添加</a>
    </div>
    </div>
</body>
</html>