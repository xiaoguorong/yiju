<?php
$pid=$_GET["id"];
include "../../public/db.php";
$sql="SELECT * FROM project where pid=$pid";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
$imgs="";
$pics=$arr["ppictures"];
$arrimg=explode(";",$pics);
array_pop($arrimg);
foreach($arrimg as $v){
    $imgs.="<img src='../../upload/{$v}'>";
}
include "../../public/db.php";
$sqlsql="select * from team";
$rr=$db->query($sqlsql);
$arrarr=$rr->fetch_all(MYSQLI_ASSOC);
$strstr="";
foreach($arrarr as $v){
    if($v["tid"]==$arr["did"]){
        $strstr.="<option value='{$v["tid"]}' selected>{$v["tname"]}</option>";
    }else{
        $strstr.="<option value='{$v["tid"]}'>{$v["tname"]}</option>";
    }
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
    <li><a href="projectlist.php">商品管理</a></li>
    <li><a href="#">项目修改</a></li>
</ol>
<form action="checkprojectupdate.php" method="post" class="form-horizontal col-sm-8">
    <input type="hidden" name="pid" value="<?php echo $arr['pid']?>">
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">名称</label>
        <div class="col-sm-6">
            <input type="text" name="pname" class="form-control" id="input1" value="<?php echo $arr['pname']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-6">
            <input type="file" id="file">
            <div class="show1">
                <img src="../../upload/<?php echo $arr['pthumb']?>" alt="">
            </div>
            <input type="button" class="btn btn-warning" value="预览" id="previews1">
            <input type="button" value="上传" id="upload1" class="btn btn-success">
            <input type="hidden" name="pthumb" value="<?php echo $arr['pthumb']?>">
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
            <input type="hidden" name="ppictures" value="<?php echo $arr['ppictures']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="input5" class="col-sm-2 control-label">描述</label>
        <div class="col-sm-6">
            <textarea type="text" name="pdescription" class="form-control" id="input5"><?php echo $arr['pdescription']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">设计师</label>
        <div class="col-sm-6">
            <select type="text" name="did" class="form-control" >
                <?php echo $strstr;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="input5" class="col-sm-2 control-label">类型</label>
        <div class="col-sm-6">
            <select type="text" name="ptype" class="form-control" id="input5">
                <option value="1" <?php if($arr["ptype"]=="1"){echo "selected";}?>>阳台</option>
                <option value="2" <?php if($arr["ptype"]=="2"){echo "selected";}?>>厨房</option>
                <option value="3" <?php if($arr["ptype"]=="3"){echo "selected";}?>>客厅</option>
                <option value="4" <?php if($arr["ptype"]=="4"){echo "selected";}?>>书房</option>
                <option value="5" <?php if($arr["ptype"]=="5"){echo "selected";}?>>卧室</option>
            </select>
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
                $("[name=pthumb]").val(r)
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
                        $("[name=ppictures]").val(str);
                    }
                }
            })
        })
    })
</script>
</body>
</html>