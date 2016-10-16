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
        <?= frontend\modules\web\widgets\Footer::widget(); ?>
        <!--end 底部信息-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
