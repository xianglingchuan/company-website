
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
                    <ul class="title-list cf ">
                        <?php
                        if(!empty($categoryList)){
                            foreach($categoryList as $category){
                                echo '<li class="on">'.$category['name'].'</li>';
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
                        foreach($categoryList as &$_category){
                            echo '<div class="product show"><ul class="cf">';
                            if(count($_category['products']) >=1){
                              foreach($_category['products'] as $product){ ?>
                    <li><a href="/web/product/view?id=<?php echo $product['id']; ?>&category_id=<?php echo $product['category_id'];?>" class="img_box"><img src="<?php echo $product['cover'];?>" alt="<?php echo $product['title'];?>"></a><a href="#" class="cp_txt1"><?php echo $product['title'];?></a></li>
                              <?php
                              }
                            } 
                            echo '</ul></div>';
                        }
                    }                        
                    ?>
                    
                    
                    
                        
<!--                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621103405391.jpg" alt="弹力椅套"></a><a href="#" class="cp_txt1">弹力椅套</a></li>
                        -->
<!--                    <div class="product ">
                        <ul class="cf">

                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104107410.jpg" alt="酒店纯色桌布"></a><a href="#" class="cp_txt1">酒店纯色桌布</a></li>                                    
                        </ul>
                    </div>-->
<!--                    <div class="product ">
                        <ul class="cf">
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104328765.jpg" alt="卷式窗帘"></a><a href="#" class="cp_txt1">卷式窗帘</a></li>                                    
                        </ul>
                    </div>-->
<!--                    <div class="product ">
                        <ul class="cf">
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                            <li><a href="#" class="img_box"><img src="/style/web/img/20160621104624443.jpg" alt="会议室软包"></a><a href="#" class="cp_txt1">会议室软包</a></li>
                        </ul>
                    </div>-->
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
                    <p>
                    <?php
                    $content = strip_tags(Yii::$app->setting->get('companyContent'));
                    $content = mb_substr($content, 0, 1002);
                    echo $content;
                    ?>    
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
                               //echo $yearMonth;
                               //$content = strip_tags($buf['content']);
                               //$content = mb_substr($content, 0, 100);
                            ?>
                            <li>
                                <div class="news-time"><span><?php echo $day; ?></span><label><?php echo $yearMonth; ?></label></div>
                                <div class="news_nr">
                                    <a href="/web/news/view?id=<?php echo $buf['id'];?>&category_id=<?php echo $buf['category_id']?>"><?php echo $buf['title'];?></a>
                                    <p><?php echo $buf['basic_facts'];?></p>
                                </div>
                            </li>                            
                       <?php
                       }
                    }
                    ?>
                    

                    
                    
<!--                    <li>
                        <div class="news-time"><span>14 </span><label>2016-07</label></div>
                        <div class="news_nr">
                            <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=46">北京华泰瑞诚定做沙发套</a>
                            <p>定做沙发套【华泰瑞诚定做沙发套】1、产品特点：根据不同的场所环境需要设计制作做出不同的款式造型，营造出不同的氛围(如乡...</p>
                        </div>
                    </li>
                    <li>
                        <div class="news-time"><span>14 </span><label>2016-07</label></div>
                        <div class="news_nr">
                            <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=45">北京华泰瑞诚沙发翻新</a>
                            <p>沙发、座椅翻新【华泰瑞诚沙发、座椅翻新】1、产品特点：根据不同的场所环境需要设计制作做出不同的款式造型，营造出不同的氛...</p>
                        </div>
                    </li>
                    <li style="border-bottom:0;">
                        <div class="news-time"><span>14 </span><label>2016-07</label></div>
                        <div class="news_nr">
                            <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=15&amp;id=44">北京华泰瑞诚军用迷彩桌布</a>
                            <p>军用迷彩桌布、伪装网、设施罩北京华泰瑞诚纺织品有限公司，始创于1995年，总部坐落于亚洲最大的纺织品集散基地——中国绍兴...</p>
                        </div>
                    </li>-->
                </ul>
                <!--end 新闻内容-->                        
            </div>
            <!--end 右侧新闻中心-->
        </div>
    </div>
</div>
