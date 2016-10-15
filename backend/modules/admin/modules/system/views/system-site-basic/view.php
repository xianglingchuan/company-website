<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Models;
use backend\helpers\CommonHelp;

$title = "基本设置";
$this->title = $title . '-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
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
                        'value' => isset($viewData['siteQrCode']) && !empty($viewData['siteQrCode']) ? $viewData['siteQrCode'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('siteTopLog'),
                        'value' => isset($viewData['siteTopLog']) && !empty($viewData['siteTopLog']) ? $viewData['siteTopLog'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('siteTopAd'),
                        'value' => isset($viewData['siteTopAd']) && !empty($viewData['siteTopAd']) ? $viewData['siteTopAd'] : "暂无", 
                    ],     
                    [
                        'label' => $model->myLabels('siteLeftAd'),
                        'value' => isset($viewData['siteLeftAd']) && !empty($viewData['siteLeftAd']) ? $viewData['siteLeftAd'] : "暂无", 
                    ],                      
                ],
            ])
            ?>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>













