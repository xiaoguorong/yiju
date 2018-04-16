<!-- 站点地图 -->
<div class="end">
    <div class="end1">
        <div class="ditu">
            <div style="width:1000px;height:550px;border:#ccc solid 1px;margin-top: -185px;" id="container"></div>
            <div class="map_tu">
                <img src="../static/img/tuiyuan.png">
            </div>
            <div class="dizhi">
                <span>工作室地址ADDRESS</span>
                <p>山西省太原市小店区平阳路220号</p>
            </div>
        </div>
        <div class="xinxi">
            <form>
                <input type="text" placeholder="姓名" class="xinxi_name">
                <input type="text" placeholder="邮箱" class="xinxi_name xinxi_youxiang">
                <textarea placeholder="您的留言......" class="xinxi_name xinxi_liuyan"></textarea>
                <div class="more more2">
                    <span>SEND</span>
                    <div class="more_blue">+</div>
                </div>
            </form>
        </div>
        <div class="gengduo">
            <p>更多内容请查看</p>
            <span>MORE NEIRONG PLEASE</span>
            <ul>
                <li class="gengduo_li">
                    <p>家具资质</p>
                    <p>公司前身</p>
                    <p>合作关系</p>
                    <p>商务运营</p>
                </li>
                <li class="gengduo_li gengduo_li1">
                    <p>新闻中心</p>
                    <p>企业新闻</p>
                    <p>行业新闻</p>
                    <p>区域活动</p>
                </li>
                <li class="gengduo_li">
                    <p>品牌印象</p>
                    <p>家居生活</p>
                    <p>企业影像</p>
                    <p>家具精品</p>
                </li>
            </ul>
        </div>
        <div class="gengduo meiti">
            <p>媒体运营号</p>
            <span>MORE NEIRONG PLEASE</span>
            <img src="../static/img/qq.png" class="meiti_img">
            <img src="../static/img/weixin1.png" class="meiti_img">
            <img src="../static/img/weibo1.png">
            <p>关注公众平台/可获取更多资讯以及商务活动机会</p>
        </div>
    </div>
</div>
<div class="end2">
    <p>京ICP备11017824号-4 京ICP证130164号 北京市公安局朝阳分局备案编号：11010502000501</p>
    <p>网络文化经营许可证 京网文[2013]6173-844号 广播电视节目制作经营许可证 （京）字第06990号</p>
</div>
<script src="../static/js/jquery-3.3.1.min.js"></script>
</body>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=	iI4410Rl94DHrgZGfqroSptyyqGmsL7U"></script>
<script type="text/javascript">
    var map = new BMap.Map("container");          // 创建地图实例
    var point = new BMap.Point(112.571,37.81408);  // 创建点坐标
    map.centerAndZoom(point, 15);
    map.enableScrollWheelZoom(true);
</script>
</body>
</html>