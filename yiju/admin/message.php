<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    span{
        font-size: 25px;
        display: block;
        width: 200px;
        margin: auto;
        margin-top: 100px;
        text-align: center;
    }
    .time{
        margin: auto;
        font-size: 20px;
        width: 300px;
        text-align: center;
        margin-top: 80px;
    }
</style>
<body>
    <div>
        <span><?php echo $msg;?></span>
        <div class="time">当前页面会在<time>10</time>s后跳转,请<a href="<?php echo $href;?>">点击</a></div>
    </div>
    <script>
        let time=document.querySelector("time");
        let a=document.querySelector("a");
        let n=10;
        setInterval(function(){
            n--;
            time.innerHTML=n;
            if(n===0)
            {
                location.href=a.href;
            }
        },1000)
    </script>
</body>
</html>