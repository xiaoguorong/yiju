<?php
include "../../public/db.php";
$sql="select * from team";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach($arr as $v){
    $str.="<option value='{$v["tid"]}'>{$v["tname"]}</option>";
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
    <li><a href="projectlist.php">案例管理</a></li>
    <li><a href="projectinsert.php">添加案例</a></li>
</ol>
<form action="checkprojectinsert.php" method="" class="form-horizontal col-sm-8">
    <div class="form-group">
        <label class="col-sm-2 control-label">名称</label>
        <div class="col-sm-6">
            <input type="text" name="pname" class="form-control" placeholder="请输入商品名称" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-6">
            <input type="file" id="file">
            <div class="show1"></div>
            <input type="button" value="预览"class="btn btn-warning"  id="previews1">
            <input type="button" value="上传" class="btn btn-success" id="upload1">
            <input type="hidden" name="pthumb">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">多图片</label>
        <div class="col-sm-6">
            <input type="file" id="files" multiple>
            <div class="show2"></div>
            <input type="button" value="预览"class="btn btn-warning"  id="previews2">
            <input type="button" value="上传" class="btn btn-success" id="upload2">
            <input type="hidden" name="ppictures">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">描述</label>
        <div class="col-sm-6">
            <input type="text" name="pdescription" class="form-control" placeholder="请输入商品名称" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">设计师</label>
        <div class="col-sm-6">
            <select class="form-control" name="did">
                <?php echo $str;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">类型</label>
        <div class="col-sm-6">
            <select class="form-control" name="ptype">
                <option value="1">阳台</option>
                <option value="2">厨房</option>
                <option value="3">客厅</option>
                <option value="4">书房</option>
                <option value="5">卧室</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">确定添加</label>
        <div class="col-sm-6">
            <input type="submit" value="提交">
        </div>
    </div>
</form>
</table>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $("#previews1").click(function(){
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
        if(files.length===0){
            return;
        }
        $.each(files,function(index,file){
            let fr=new FileReader();
            fr.readAsDataURL(file);
            fr.onload=function(){
                $("<img>").attr("src",fr.result).appendTo(".show2");
            }
        })})
    $("#upload2").click(function(){
        let files=$("#files")[0].files;
        let str="";
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
                    $("[name=ppictures]").val(str);
                }})
        })
    })
</script>
</body>
</html>