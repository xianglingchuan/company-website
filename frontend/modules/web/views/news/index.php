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
                        <ul>
                            <?php
                            if(!empty($articleList['model'])){
                                foreach($articleList['model'] as $object){?>
                                <li><span>▪</span><a href="/web/news/view?id=<?php echo $object->id; ?>&category_id=<?php echo $object->category_id; ?>"><?php echo $object->title; ?></a><label><?php echo substr($object->created_at, 0, 10); ?></label></li>                                    
                                <?php 
                                }
                            }
                            ?>
                            <?= LinkPager::widget(['pagination' => $articleList['pages']]); ?>
                                
                            
                            
<!--                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=46">北京华泰瑞诚定做沙发套</a><label>2016-07-14</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=45">北京华泰瑞诚沙发翻新</a><label>2016-07-14</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=44">北京华泰瑞诚军用迷彩桌布</a><label>2016-07-14</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=43">北京华泰瑞诚—中式坐垫</a><label>2016-07-14</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=42">北京华泰瑞诚纺织品有限公司-卷式窗帘</a><label>2016-07-11</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=41">一般意义的'弹力椅套'是伪概念！</a><label>2016-06-22</label></li>
                            <li><span>▪</span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=40">北京华泰瑞诚—酒店椅套专业厂家！</a><label>2016-06-22</label></li>-->
                        </ul>
                        <div class="fy"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end 内容-->
