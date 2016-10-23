<?php
$this->title = "产品中心-".Yii::$app->setting->get("siteName");
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->setting->get("siteDescription")], 'meta-description');
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->setting->get("siteKeyword")], 'meta-keywords');
?>
<?php
use yii\widgets\LinkPager;
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
        <div class="w1 cpzx_plan1">
            <!--begin 左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t" style="height:113px;">
                    <h5>产品中心</h5>
                    <span>Product Center</span>
                </div>
                <?= frontend\modules\web\widgets\ProductCategory::widget(); ?>
                <?= frontend\modules\web\widgets\LeftAd::widget(); ?>
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
                    <span><?php
                            if(!empty($categoryInfo)){
                                echo $categoryInfo->name;
                            }else{
                                echo "暂无";
                            }
                            ?>
                    </span>
                    <div class="fr">您现在所在的位置：<a href="/web/index/index">首页</a>
                            <?php
                            if(!empty($categoryInfo)){?>
                                &gt; <a href="/web/product/index?category_id=<?php echo $categoryInfo->id; ?>"><?php echo $categoryInfo->name; ?></a>
                            <?php
                            }else{
                                echo "&gt; 暂无";
                            }
                            ?>
                    </div>
                </div>
                <!--end 标题-->
                <ul>
                            <?php
                            if(!empty($list['model'])){
                                foreach($list['model'] as $info){?>
                                <li id="product_<?php echo $info['id'];?>">
                                    <a href="/web/product/view?id=<?php echo $info['id'];?>&category_id=<?php echo $info['category_id']; ?>" class="img_box1"><img src="<?php echo $info['cover'];?>" alt="<?php echo $info['title'];?>">
                                        <p><span>查看详情</span></p>
                                    </a>
                                    <a href="/web/product/view?id=<?php echo $info['id'];?>&category_id=<?php echo $info['category_id']; ?>" class="cp_txt"><?php echo $info['title'];?></a>
                                </li>
                                <?php 
                                }
                            }
                            ?>
                </ul>                
                <?php // LinkPager::widget(['pagination' => $list['pages']]); ?>
                

                        <div id="mypage">
                            <?= LinkPager::widget(['pagination' => $list['pages'], 
                                "activePageCssClass"=>"activePageCssClass", 
                                "disabledPageCssClass"=>"disabledPageCssClass",
                                "firstPageCssClass" => "firstPageCssClass",
                                "lastPageCssClass" => "lastPageCssClass",
                                "nextPageCssClass" => "nextPageCssClass",
                                "prevPageCssClass" => "prevPageCssClass"
                                ]); ?>                            
                        </div>
                
            </div>
            

            
            <!--end 右侧内容-->

        </div>
    </div>
</div>
<!--end 内容-->
