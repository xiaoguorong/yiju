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

</style>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script src="../../static/js/jquery.validate.js"></script>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">修改密码</a></li>
</ol>
<form action="checkupdate.php" id="myform" method="post" class="form-horizontal col-sm-6">
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">原始密码</label>
        <div class="col-sm-6">
            <input type="password" name="oldpass" class="form-control" id="input1" placeholder="请输入原始密码" required>
        </div>
    </div>
    <div class="form-group">
        <label for="input2" class="col-sm-2 control-label">新密码</label>
        <div class="col-sm-6">
            <input type="password" name="newpass" class="form-control" id="input2" placeholder="请输入原始密码" required>
        </div>
        </div>
    <div class="form-group">
        <label for="input3" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-6">
            <input type="password" name="newpass2" class="form-control" id="input3" placeholder="请输入原始密码" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">确认修改</label>
        <div class="col-sm-3">
            <input type="submit" class="form-control" placeholder="请输入原始密码" required>
        </div>
    </div>

</form>
<script>
    $("#myform").validate({
        rules:{
            oldpass:{
                required:true
            },
            newpass:{
                required:true
            },
            newpass2:{
                required:true,
                equalTo:"#pass"
            }
        }
    })
</script>
</body>
</html>