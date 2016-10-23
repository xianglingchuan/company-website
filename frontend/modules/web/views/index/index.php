<?php
$this->title = Yii::$app->setting->get("siteName");
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->setting->get("siteDescription")], 'meta-description');
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->setting->get("siteKeyword")], 'meta-keywords');
?>
<script>
            $(function () {
                $('.title-list li').mouseover(function () {
                    var liindex = $('.title-list li').index(this);
                    $(this).addClass('on').siblings().removeClass('on');
                    $('.product-wrap div.product').eq(liindex).fadeIn(150).siblings('div.product').hide();
                    var liWidth = $('.title-list li').width();
                    $('.case .title-list p').stop(false, true).animate({'left': liindex * liWidth + 'px'}, 300);
                });
                $('.product-wrap ul li').mouseover(function () {
                    $('.product-wrap ul li').each(function(){
                       $(this).find("a p").css("display", "none");
                    });
                    $(this).find("a p").css("display", "block");
                });                
            });
        </script>
<!--begin 顶部信息--> 
<div id="header">
   <?= frontend\modules\web\widgets\TopLogo::widget(); ?>
   <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
   <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->         

<div id="main">
    <div class="container">

        <!--begin 产品中心-->
        <div class="plan1_cpzx w1">
            <!--begin 产品中心标题-->
            <div class="title1">
                <div class="fl line1"></div>
                <div class="fl title_nr">
                    <span>Product Center</span>
                    <h5>产品中心</h5>
                </div>
                <div class="fr line1"></div>
            </div>
            <!--end 产品中心标题-->

            <!--begin 产品内容-->
            <div class="case">
                <!--begin 产品分类切换-->
                <div class="title cf">
                    <ul class="title-list cf" id="product_category_ul">
                        <?php
                        if(!empty($categoryList)){
                            $i = 1;
                            foreach($categoryList as $category){
                                $className = $i==1 ?  "on" : "";
                                echo '<li class="'.$className.'">'.$category['name'].'</li>';
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!--end 产品分类切换-->

                <!--begin 产品内容-->
                <div class="product-wrap">
                    <?php
                    if(!empty($categoryList)){
                        $j = 1;
                        foreach($categoryList as &$_category){
                            $style =  $j==1 ?  " style='display: block;' " : "";
                            echo '<div class="product" '.$style.'><ul class="cf">';
                            if(count($_category['products']) >=1){
                              foreach($_category['products'] as $product){ ?>
                                    <li><a href="/web/product/view?id=<?php echo $product['id']; ?>&category_id=<?php echo $product['category_id'];?>" class="img_box"><img src="<?php echo $product['cover'];?>" alt="<?php echo $product['title'];?>">
                                        <p><span>查看详情</span></p>
                                        </a>
                                        <a href="/web/product/view?id=<?php echo $product['id']; ?>&category_id=<?php echo $product['category_id'];?>" class="cp_txt1"><?php echo $product['title'];?></a></li>
                              <?php
                              }
                            } 
                            $j++;
                            echo '</ul></div>';
                        }
                    }                        
                    ?>
                </div>
                <!--end 产品内容-->
            </div>
            <!--end 产品内容-->
        </div>
        <!--end 产品中心-->


        <div class="plan2_news w1">
            <!--begin 左侧公司简介-->
            <div class="fl gsxw">
                <!--begin 公司简介标题-->
                <div class="title2">
                    <h5>公司简介</h5>
                    <div class="fr"><span>/ Company profile</span><a href="/web/index/company">MORE＋</a></div>
                </div>
                <!--end 公司简介标题-->
                
                
                <!--begin 公司简介内容-->
                <div class="plan2_newsnr1">
                    <a href="/web/index/company"><img src="<?php echo $model->getImgPath(Yii::$app->setting->get('companyHomeImg')); ?>" alt="公司简介"></a>
                    <p class="text-hide">
                    <?php  echo "&nbsp;&nbsp;".$model->getCompanyContentByHome();?>    
                    </p>
                </div>
                <!--begin 公司简介内容-->
            </div>
            <!--end 左侧公司简介-->



            <!--begin 右侧新闻中心-->
            <div class="fr xwzx">
                <!--begin 新闻标题-->
                <div class="title2">
                    <h5>新闻中心</h5>
                    <div class="fr">
                        <span>/ News Center</span>
                        <a href="/web/news/index?category_id=5">MORE＋</a>
                    </div>
                </div>
                <!--end 新闻标题-->

                <!--begin 新闻内容-->
                <ul>
                    <?php
                    if(!empty($articleList)){
                        foreach($articleList as &$buf){ 
                               $yearMonth = substr($buf['created_at'], 0, 7);
                               $day = substr($buf['created_at'], 8, 2);
                            ?>
                            <li>
                                <div class="news-time"><span><?php echo $day; ?></span><label style="font-weight: 100;"><?php echo $yearMonth; ?></label></div>
                                <div class="news_nr">
                                    <a href="/web/news/view?id=<?php echo $buf['id'];?>&category_id=<?php echo $buf['category_id']?>"><?php echo $buf['title'];?></a>
                                    <p>
                                        <?php 
                                        
                                        
                                        echo $buf['describe'];
                                        
                                        ?>
                                    
                                    </p>
                                </div>
                            </li>                            
                       <?php
                       }
                    }
                    ?>
                </ul>
                <!--end 新闻内容-->                        
            </div>
            <!--end 右侧新闻中心-->
        </div>
    </div>
</div>
