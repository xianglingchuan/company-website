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
        <link href="/style/web/css/style.css" rel="stylesheet">
        <script src="/style/web/js/jquery.min.js"></script>
        <script src="/style/web/js/banner.js"></script>
        <!--        <script src="/style/web/js/ban.js"></script>-->
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
