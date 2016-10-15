<!--begin 顶部信息--> 
<div id="header">
   <?= frontend\modules\web\widgets\TopLog::widget(); ?>
   <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
   <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->   
        
        
        <!--begin 内容-->
        <div id="main">
            <div class="container">
                <div class="w1 xq_plan1">
                    <div class="left_menu">
                        <div class="left_menu_t">
                            <h5>联系我们</h5>
                            <span>contact us</span>
                        </div>
                        <ul>
                            <li class="dqlm"><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=10">联系我们</a></li></ul>
                        <div id="menu2" class="zfd" style="position: static;">
                            <div class="zbwx"><p><img src="./about_us_files/ewm.jpg"></p><span>扫一扫，咨询我们</span></div>
                            <div class="zblx"><img src="./about_us_files/dianh.jpg"></div>
                        </div>
                    </div>
                    <script>
                        var subnavT = $(".zfd").offset().top;
                        $(window).scroll(function () {
                            var scrollH = $(window).scrollTop();
                            var contentH = $("#dwei").height() - $(".zfd").height();
                            if (scrollH > subnavT && scrollH < contentH + subnavT - 200) {
                                $(".zfd").stop().css({
                                    "position": "absolute",
                                    "top": scrollH - subnavT + 180 + "px"
                                });
                            } else if (scrollH < subnavT) {
                                $(".zfd").stop().css({
                                    "position": "static",
                                });
                            }
                        });
                    </script>
                    <div class="fr xq_plan1_nr" id="dwei">
                        <div class="wz">
                            <span>联系我们</span>
                            <div class="fr">您现在所在的位置：<a href="http://www.bjhtrc.com/">首页</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=10">联系我们</a></div>
                        </div>
                        <div class="article" style="border-bottom:none;"><img src="./about_us_files/20160702100429840.jpg" style="float: left;">联系电话：010-57169851　手机：13621346059　13146209462<br>
                            <br>
                            邮箱：lingdonghua2010@163.com<br>
                            <br>
                            地址：（瑞诚纺织北方总部）河北省廊坊市永清工业开发区浙商新城 7路 128号<br>
                            <br>
                            地址：（一厂）北京市大兴区南中轴路金星园22号院　<br>
                            <br>
                            地址：（二厂）北京市朝阳区十八里店乡老君堂工业区103号院</div>

                    </div>
                </div>
            </div>
        </div>
        <!--end 内容-->
        

