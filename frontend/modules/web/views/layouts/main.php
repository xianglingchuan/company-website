<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
   
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<title>北京椅套厂家|北京酒店椅套|酒店椅套定做|酒店椅套批发|酒店弹力椅套|免烫弹力椅套|酒店宴会椅套|酒店餐厅椅套_北京华泰瑞诚纺织品有限公司</title>-->
        <meta name="keywords" content="北京椅套厂家|北京酒店椅套|酒店椅套定做|酒店椅套批发|酒店弹力椅套|免烫弹力椅套|酒店宴会椅套|酒店餐厅椅套">
        <meta name="description" content="北京华泰瑞诚纺织品有限公司专业酒店椅套厂家，致力于定做酒店椅套、酒店椅套批发、酒店弹力椅套、免烫弹力布椅套、酒店宴会椅套、酒店餐饮椅套、酒店餐厅椅套等，定制热线:01057169851">
        <link href="/style/web/css/style.css" rel="stylesheet">
        <script src="/style/web/js/jquery.min.js"></script>
        <script src="/style/web/js/ban.js"></script>
        <script>
            $(function () {
                $('.title-list li').mouseover(function () {
                    var liindex = $('.title-list li').index(this);
                    $(this).addClass('on').siblings().removeClass('on');
                    $('.product-wrap div.product').eq(liindex).fadeIn(150).siblings('div.product').hide();
                    var liWidth = $('.title-list li').width();
                    $('.case .title-list p').stop(false, true).animate({'left': liindex * liWidth + 'px'}, 300);

                });
            });
        </script>
    </head>
    <body>
        <?php $this->beginBody() ?>

        
        <?= $content ?>
        



        <!--begin 底部信息-->
        <div id="footer">
            <div class="w1">
                <div class="fl">
                    <div class="banquan">
                        版权所有： © 北京华泰瑞诚纺织品有限公司<br>
                        联系电话：010-57169851　手机：13621346059　13146209462<br>
                        邮箱：lingdonghua2010@163.com<br>
                        地址：（瑞诚纺织北方总部）河北省廊坊市永清工业开发区浙商新城 7路 128号<br>
                        地址：（一厂）北京市大兴区南中轴路金星园22号院　地址：（二厂）北京市朝阳区十八里店乡老君堂工业区103号院                                        <div><a href="http://www.ynhl.net/" target="_blank">网站建设：</a><a href="http://www.ynhl.net/" target="_blank">一诺互联</a><br></div>
                    </div>
                    <div class="ftb">
                        <span><img src="/style/web/img/ftb1.jpg"><label>经营性网站<br>备案信息</label></span>
                        <span><img src="/style/web/img/ftb2.jpg"><label>中国<br>互联网协会</label></span>
                        <span><img src="/style/web/img/ftb3.jpg"><label>网警110<br>报警服务</label></span>
                        <span><img src="/style/web/img/ftb4.jpg"><label>不良信息<br>举报中心</label></span>
                        <span><img src="/style/web/img/ftb5.jpg"><label>诚信网站<br>示范企业</label></span>
                    </div>
                </div>
                <div class="fr">
                    <div class="fr ewm">
                        <img src="/style/web/img/ewm.jpg">
                        扫一扫，咨询我们
                    </div>
                </div>
            </div>
        </div>
        <!--end 底部信息-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
