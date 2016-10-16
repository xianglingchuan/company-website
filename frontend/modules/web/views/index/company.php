<!--begin 顶部信息--> 
<div id="header">
    <?= frontend\modules\web\widgets\TopLogo::widget(); ?>
    <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
    <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->      


<!--begin 内容信息-->
<div id="main">
    <div class="container">
        <div class="w1 xq_plan1">
            <!--begin 公司简介左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t" style="height:113px;">
                    <h5>公司简介</h5>
                    <span>Company profile</span>
                </div>
                <ul>
                    <li class="dqlm"><span class="sj1"></span><a href="/web/index/company">公司简介</a></li>                
                </ul>
                <?= frontend\modules\web\widgets\LeftAd::widget(); ?>
            </div>
            <!--end 公司简介左侧内容-->


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
            <!--begin 公司简介右侧内容-->
            <div class="fr xq_plan1_nr" id="dwei">
                <div class="wz">
                    <span>公司简介</span>
                    <div class="fr">您现在所在的位置：<a href="/web/index/index">首页</a> &gt; <a href="/web/index/company">公司简介</a></div>
                </div>
                <div class="article" style="border-bottom:none;">
                    <?php echo frontend\helpers\CommonHelp::replaceImgUrl(Yii::$app->setting->get('companyContent')); ?>
                </div>
            </div>
            <!--end 公司简介右侧内容-->
        </div>
    </div>
</div>
<!--end 内容信息-->

