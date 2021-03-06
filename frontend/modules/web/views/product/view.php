<?php
$this->title = Yii::$app->setting->get("siteName");
$description = Yii::$app->setting->get("siteDescription");
$keyword = Yii::$app->setting->get("siteKeyword");
if(!empty($info)){
    $this->title = $info->title."-".$this->title;
    $description = $info->basic_facts."-".$description;
    $keyword = $info->short_basic_facts."-".$keyword;
}
$this->registerMetaTag(['name' => 'description', 'content' => $description], 'meta-description');
$this->registerMetaTag(['name' => 'keywords', 'content' => $keyword], 'meta-keywords');
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
            <!--begin 左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t" style="height:113px; ">
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
                            "position": "static";
                        });
                    }
                });
            </script>

            <!--begin 右侧内容-->
            <div class="fr xq_plan1_nr" id="dwei">
                <div class="wz">
                    <span>
                            <?php
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
                <div class="title4">
                    <?php echo $info->title; ?>                    <span>发表时间：<?php echo str_replace("-", ".", substr($info->created_at, 0, 10));?></span>
                </div>
                <div class="article">
                    <?php echo $info->content; ?>
                </div>
                <div class="syp fl">
                    <?php
                    if(!empty($lastInfo)){
                        echo '<a href="/web/product/view?id='.$lastInfo['id'].'&category_id='.$lastInfo['category_id'].'">上一篇：'.$lastInfo['title'].'</a>';
                    }
                    ?>
                    <?php
                    if(!empty($nextInfo)){
                        echo '<a href="/web/product/view?id='.$nextInfo['id'].'&category_id='.$nextInfo['category_id'].'">下一篇：'.$nextInfo['title'].'</a>';
                    }
                    ?>                </div>
                
                
                <div class="fx fr">             
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style_24x24">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                        <a class="jiathis_counter_style"></a>
                </div>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
                </div>


                
                
                
                <div class="fhsy"><a href="/web/index/index">返回首页</a></div>
            </div>
            <!--end 右侧内容-->
        </div>
    </div>
</div>
<!--end 内容-->

