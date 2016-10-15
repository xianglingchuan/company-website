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
        <div class="w1 cpzx_plan1">
            <!--begin 左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t">
                    <h5>产品中心</h5>
                    <span>Product Center</span>
                </div>
                <ul>
                    <li class="dqlm"><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11">椅套系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=12">桌布系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=13">窗帘系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=14">软包墙系列</a></li>
                </ul>
                <div id="menu2" class="zfd" style="position: static;">
                    <div class="zbwx"><p><img src="style/img/ewm.jpg"></p><span>扫一扫，咨询我们</span></div>
                    <div class="zblx"><img src="style/img/dianh.jpg"></div>
                </div>
            </div>
            <!--end 左侧内容-->

            <script>
                var subnavT = $(".zfd").offset().top;
                $(window).scroll(function() {
                    var scrollH = $(window).scrollTop();
                    var contentH = $("#dwei").height() - $(".zfd").height();
                    if (scrollH > subnavT && scrollH < contentH + subnavT - 300) {
                        $(".zfd").stop().css({
                            "position": "absolute",
                            "top": scrollH - subnavT + 370 + "px"
                        });
                    } else if (scrollH < subnavT) {
                        $(".zfd").stop().css({
                            "position": "static",
                        });
                    }
                });
            </script>
            <!--begin 右侧内容-->
            <div class="fr cpzx_plan1_nr" id="dwei">
                <!--begin 标题-->
                <div class="wz">
                    <span>椅套系列</span>
                    <div class="fr">您现在所在的位置：<a href="http://www.bjhtrc.com/">首页</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=6">产品中心</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11">椅套系列</a></div>
                </div>
                <!--end 标题-->
                <ul>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=16" class="img_box1"><img src="style/img/20160621103405391.jpg" alt="弹力椅套"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=16" class="cp_txt">弹力椅套</a>
                    </li>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=15" class="img_box1"><img src="style/img/20160621103507352.jpg" alt="酒店椅套速购区"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=15" class="cp_txt">酒店椅套速购区</a>
                    </li>
                    <li style="margin-right:0;">
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=14" class="img_box1"><img src="style/img/20160621104022497.jpg" alt="酒店椅套定制区"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=14" class="cp_txt">酒店椅套定制区</a>
                    </li>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=13" class="img_box1"><img src="style/img/20160621103610833.jpg" alt="大客车椅套"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=13" class="cp_txt">大客车椅套</a>
                    </li>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=12" class="img_box1"><img src="style/img/20160621103640611.jpg" alt="阶梯室排椅套"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=12" class="cp_txt">阶梯室排椅套</a>
                    </li>
                    <li style="margin-right:0;">
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=11" class="img_box1"><img src="style/img/20160621103708187.jpg" alt="办公椅套"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=11" class="cp_txt">办公椅套</a>
                    </li>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=10" class="img_box1"><img src="style/img/20160621103734218.jpg" alt="椅套LOGO制作"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=10" class="cp_txt">椅套LOGO制作</a>
                    </li>
                    <li>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=9" class="img_box1"><img src="style/img/20160621103819150.jpg" alt="定做沙发套"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=9" class="cp_txt">定做沙发套</a>
                    </li>
                    <li style="margin-right:0;">
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=8" class="img_box1"><img src="style/img/20160621103837481.jpg" alt="中式坐垫"></a>
                        <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=8" class="cp_txt">中式坐垫</a>
                    </li>
                </ul>
                <div class="fy"><a class="a1">12条</a> <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11" class="a1">上一页</a> <span>1</span> <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11&amp;page=2">2</a> <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11&amp;page=2" class="a1">下一页</a></div>
            </div>
            <!--end 右侧内容-->

        </div>
    </div>
</div>
<!--end 内容-->
