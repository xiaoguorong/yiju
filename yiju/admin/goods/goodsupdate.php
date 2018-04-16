<?php
    $gid=$_GET["id"];
    include "../../public/db.php";
    $sql="SELECT * FROM goods where gid=$gid";
    $r=$db->query($sql);
    $arr=$r->fetch_array(MYSQLI_ASSOC);
    $imgs="";
    $pics=$arr["gpictures"];
    $arrimg=explode(";",$pics);
    array_pop($arrimg);
    foreach($arrimg as $v){
        $imgs.="<img src='../../upload/{$v}'>";
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
    <li><a href="goodslist.php">商品管理</a></li>
    <li><a href="#">商品修改</a></li>
</ol>
<form action="checkgoodsupdate.php" method="post" class="form-horizontal col-sm-8">
    <input type="hidden" name="gid" value="<?php echo $arr['gid']?>">
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">名称</label>
        <div class="col-sm-6">
            <input type="text" name="gname" class="form-control" id="input1" value="<?php echo $arr['gname']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input2" class="col-sm-2 control-label">英文名称</label>
        <div class="col-sm-6">
            <input type="text" name="gename" class="form-control" id="input2" value="<?php echo $arr['gename']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-6">
            <input type="file" id="file">
            <div class="show1">
                <img src="../../upload/<?php echo $arr['gthumb']?>" alt="">
            </div>
            <input type="button" class="btn btn-warning" value="预览" id="previews1">
            <input type="button" value="上传" id="upload1" class="btn btn-success">
            <input type="hidden" name="gthumb" value="<?php echo $arr['gthumb']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="files" class="col-sm-2 control-label">多图片</label>
        <div class="col-sm-6">
            <input type="file" id="files" multiple>
            <div class="show2">
                <?php echo $imgs?>
            </div>
            <input type="button" class="btn btn-warning" value="预览" id="previews2">
            <input type="button" value="上传" id="upload2" class="btn btn-success">
            <input type="hidden" name="gpictures" value="<?php echo $arr['gpictures']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input5" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-6">
            <textarea type="text" name="gdescripts" class="form-control" id="input5"><?php echo $arr['gdescripts']?></textarea>
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
                $("[name=gthumb]").val(r)
            }
        })})
    $("#previews2").click(function(){
        let files=$("#files")[0].files;
        console.log(files);
        if(files.length===0){
            return;
        }
        $(".show2").empty();
        $.each(files,function(index,file){
            let fr=new FileReader();
            fr.readAsDataURL(file);
            fr.onload=function(){
                $("<img>").attr("src",fr.result).appendTo(".show2");
            }
        })
    })
    $("#upload2").click(function(){
        let files=$("#files")[0].files;
        let str="";
        let len=files.length;
        let i=0;
        $.each(files,function(index,file){
            let formdata=new FormData();
            formdata.append("f",file);
            $.ajax({
                url:"../upload.php",
                type:"post",
                data:formdata,
                contentType:false,
                processData:false,
                success:function(r){
                    str+=r+";";
                    i++;
                    if(i===len){
                        $("[name=gpictures]").val(str);
                    }
                }
            })
        })
    })
</script>
</body>
</html>