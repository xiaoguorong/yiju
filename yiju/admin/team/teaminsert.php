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
    <li><a href="">添加成员</a></li>
</ol>
<form action="checkteaminsert.php" method="" class="form-horizontal col-sm-8">
    <div class="form-group">
        <label class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-6">
            <input type="text" name="tname" class="form-control" placeholder="请输入成员姓名" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">英文名称</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="tename" placeholder="请输入成员英文名称" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">职位</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="tposition" placeholder="请输入成员职位" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-6">
            <input type="file" id="file">
            <div class="show1"></div>
            <input type="button" value="预览"class="btn btn-warning"  id="previews1">
            <input type="button" value="上传" class="btn btn-success" id="upload1">
            <input type="hidden" name="tthumb">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">描述</label>
        <div class="col-sm-6">
            <textarea name="tdescription" ></textarea>
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
        fr.readAsDataURL(file);//读取为一个图片
        fr.onload=function(){//读取成功后
            $("<img>").attr("src",fr.result).appendTo(".show1");
        }
    })
    $("#upload1").click(function(){
        let file=$("#file")[0].files[0];
        let formdata=new FormData();//放置表单数据
        formdata.append("f",file);
        $.ajax({
            url:"../upload.php",
            type:"post",
            data:formdata,
            contentType:false,
            processData:false,
            success:function(r){
                let reg=/^\d{4}\-\d{2}-\d{2}\/[a-g0-9]{32}\.(jp?g|png|gif)$/;
                if(reg.test(r)) {
                    $("[name=tthumb]").val(r)
                }
            }
        })
    })
</script>
</body>
</html>