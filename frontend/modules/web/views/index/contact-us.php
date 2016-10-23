<?php
$this->title = "联系我们-".Yii::$app->setting->get("siteName");
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->setting->get("siteDescription")], 'meta-description');
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->setting->get("siteKeyword")], 'meta-keywords');

?>
<!--begin 顶部信息--> 
<div id="header">
   <?= frontend\modules\web\widgets\TopLogo::widget(); ?>
   <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
   <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->   
        
        
        <!--begin 内容-->
        <div id="main">
            <div class="container">
                <div class="w1 xq_plan1">
                    <div class="left_menu">
                        <div class="left_menu_t" style="height: 113px;">
                            <h5>联系我们</h5>
                            <span>contact us</span>
                        </div>
                        <ul>
                            <li class="dqlm"><span class="sj1"></span><a href="#">联系我们</a></li>
                        </ul>
                            <?= frontend\modules\web\widgets\LeftAd::widget(); ?>
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
                            <div class="fr">您现在所在的位置：<a href="/web/index/index">首页</a> &gt; <a href="/web/index/contact-us">联系我们</a></div>
                        </div>
                        <div class="article" style="border-bottom:none;">联系电话：<?php echo $viewData['contactTel']; ?>　手机：<?php echo $viewData['contactPhone']; ?><br>
                            <br>
                            邮箱：<?php echo $viewData['contactEmail']; ?><br>
                            <br>
                            地址：<?php echo $viewData['contactAddressOne']; ?><br>
                            <br>
                            <?php 
                            if(!empty($viewData['contactAddressTwo'])){
                                echo "地址：".$viewData['contactAddressTwo']."<BR><BR>";
                            }
                            if(!empty($viewData['contactAddressThree'])){
                                echo "地址：".$viewData['contactAddressThree'];
                            }
                            ?> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end 内容-->
        

