<?php
$id=$_GET["id"];
include "../../public/db.php";
$sql="SELECT * FROM team where tid=$id";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
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
</head>
<style>
    .show1 img,.show2 img{
        width: 100px;
        height: 80px;
    }
    .show1,.show2{
        min-width: 200px;
        min-height: 80px;
        border:1px solid #ccc;
        margin:8px 0;
    }
</style>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="teamlist.php">团队管理</a></li>
    <li><a href="#">商品修改</a></li>
</ol>
<form action="checkteamupdate.php" method="post" class="form-horizontal col-sm-8">
    <input type="hidden" name="tid" value="<?php echo $arr['tid']?>">
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">名称</label>
        <div class="col-sm-6">
            <input type="text" name="tname" class="form-control" id="input1" value="<?php echo $arr['tname']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input2" class="col-sm-2 control-label">英文名称</label>
        <div class="col-sm-6">
            <input type="text" name="tename" class="form-control" id="input2" value="<?php echo $arr['tename']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-6">
            <input type="file" id="file">
            <div class="show1">
                <img src="../../upload/<?php echo $arr['tthumb']?>" alt="">
            </div>
            <input type="button" class="btn btn-warning" value="预览" id="previews1">
            <input type="button" value="上传" id="upload1" class="btn btn-success">
            <input type="hidden" name="tthumb" value="<?php echo $arr['tthumb']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">职位</label>
        <div class="col-sm-6">
            <input type="text" name="tposition" class="form-control" value="<?php echo $arr['tposition']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input5" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-6">
            <textarea type="text" name="tdescription" class="form-control" id="input5"><?php echo $arr['tdescription']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">确认修改</label>
        <div class="col-sm-6">
            <input type="submit" value="修改">
        </div>
    </div>
</form>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $("#previews1").click(function(){
        $(".show1").empty();
        let file=$("#file")[0].files[0];
        if(file===undefined){
            return;
        }
        let fr=new FileReader();
        fr.readAsDataURL(file);
        fr.onload=function(){
            $("<img>").attr("src",fr.result).appendTo(".show1");
        }
    })
    $("#upload1").click(function(){
        let file=$("#file")[0].files[0];
        let formdata=new FormData();
        formdata.append("f",file);
        $.ajax({
            url:"../upload.php",
            type:"post",
            data:formdata,
            contentType:false,
            processData:false,
            success:function(r){
                $("[name=tthumb]").val(r)
            }
        })
    })

</script>
</body>
</html>