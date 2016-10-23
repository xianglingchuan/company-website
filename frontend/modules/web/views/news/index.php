<?php
use yii\widgets\LinkPager;

$this->title = "新闻中心-".Yii::$app->setting->get("siteName");
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
                <div class="w1 list_plan1">
                    <div class="left_menu">
                        <div class="left_menu_t" style="height:113px;">
                            <h5>新闻中心</h5>
                            <span>News Center</span>
                        </div>
                        <?= frontend\modules\web\widgets\NewsCategory::widget(); ?>
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
                                    "top": scrollH - subnavT + 240 + "px"
                                });
                            } else if (scrollH < subnavT) {
                                $(".zfd").stop().css({
                                    "position": "static",
                                });
                            }
                        });
                    </script>
                    <div class="fr list_plan1_nr" id="dwei">
                        <div class="wz">
                            <span>
                            <?php
                            if(!empty($categoryInfo)){
                                echo $categoryInfo->name;
                            }else{
                                echo "暂无";
                            }
                            ?></span>
                            <div class="fr">您现在所在的位置：<a href="/web/index/index">首页</a> 
                            <?php
                            if(!empty($categoryInfo)){?>
                                &gt; <a href="/web/news/index?category_id=<?php echo $categoryInfo->id; ?>"><?php echo $categoryInfo->name; ?></a>
                            <?php
                            }else{
                                echo "&gt; 暂无";
                            }
                            ?></div>
                        </div>
                        <ul class="content_list">
                            <?php
                            if(!empty($articleList['model'])){
                                foreach($articleList['model'] as $object){?>
                            <li style="font-size: 16px;"><span>▪</span><a href="/web/news/view?id=<?php echo $object->id; ?>&category_id=<?php echo $object->category_id; ?>"><?php echo $object->title; ?></a><label style="font-weight: 100;"><?php echo substr($object->created_at, 0, 10); ?></label></li>                                    
                                <?php 
                                }
                            }
                            ?>
                        </ul>    
                        <div id="mypage">
                            <?= LinkPager::widget(['pagination' => $articleList['pages'], 
                                "activePageCssClass"=>"activePageCssClass", 
                                "disabledPageCssClass"=>"disabledPageCssClass",
                                "firstPageCssClass" => "firstPageCssClass",
                                "lastPageCssClass" => "lastPageCssClass",
                                "nextPageCssClass" => "nextPageCssClass",
                                "prevPageCssClass" => "prevPageCssClass"
                                ]); ?>                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!--end 内容-->
