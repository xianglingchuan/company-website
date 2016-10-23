<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Models;
use backend\helpers\CommonHelp;
$title = "基本设置";
$this->title = $title . '-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to(Yii::$app->homeUrl.'/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
?>
<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id" => $master_navigation_id]); ?>
        </div>
        <div class="x_section_r">
            <div class="x_prompt" style="margin-top:15px;border-bottom:none">
                <h2 style="margin-top:5px;"><?= Html::encode($title) ?></h2>	
            </div>
            <?= backend\modules\admin\widgets\AlertWidget::widget(); ?>
            <p style="float: right">
                <?= Html::a('修改', ['create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
            <?=
            DetailView::widget([
                'model' => $model,
                'id' => 'detailView',
                'attributes' => [
                    [
                        'label' => $model->myLabels('siteName'),
                        'value' => isset($viewData['siteName']) && !empty($viewData['siteName']) ? $viewData['siteName'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('siteKeyword'),
                        'value' => isset($viewData['siteKeyword']) && !empty($viewData['siteKeyword']) ? $viewData['siteKeyword'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('siteDescription'),
                        'value' => isset($viewData['siteDescription']) && !empty($viewData['siteDescription']) ? $viewData['siteDescription'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('siteQrCode'),
                        'format' => ['raw'],
                        'value' => !empty($viewData['siteQrCode']) ? Html::img($model->getImgPath($viewData['siteQrCode']),['style'=>"max-width:300px;"]) : "",
                    ],
                    [
                        'label' => $model->myLabels('siteTopLog'),
                        'format' => ['raw'],
                        'value' => !empty($viewData['siteTopLog']) ? Html::img($model->getImgPath($viewData['siteTopLog']),['style'=>"max-width:300px;"]) : "",
                    ],
                    [
                        'label' => $model->myLabels('siteTopAd'),
                        'format' => ['raw'],
                        'value' => !empty($viewData['siteTopAd']) ? Html::img($model->getImgPath($viewData['siteTopAd']),['style'=>"max-width:300px;"]) : "",
                    ],
                    [
                        'label' => $model->myLabels('siteLeftAd'),
                        'format' => ['raw'],
                        'value' => !empty($viewData['siteLeftAd']) ? Html::img($model->getImgPath($viewData['siteLeftAd']),['style'=>"max-width:300px;"]) : "",
                    ],
                ],
            ])
            ?>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>













