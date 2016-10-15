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
                    <h5>企业资质</h5>
                    <span>Enterprise qualification</span>
                </div>
                <ul>
                    <li class="dqlm"><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=7">企业资质</a></li></ul>
                <div id="menu2" class="zfd" style="position: static; top: 184px;">
                    <div class="zbwx"><p><img src="style/img/ewm.jpg"></p><span>扫一扫，咨询我们</span></div>
                    <div class="zblx"><img src="style/img/dianh.jpg"></div>
                </div>
            </div>
            <script>
                var subnavT = $(".zfd").offset().top;
                $(window).scroll(function() {

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
                    <span>企业资质</span>
                    <div class="fr">您现在所在的位置：<a href="http://www.bjhtrc.com/">首页</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=7">企业资质</a></div>
                </div>
                <div class="article" style="border-bottom:none;"><div style="text-align: center;"><img src="style/img/20160624045552735.jpg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end 内容-->


