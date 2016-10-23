<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Models;
use backend\helpers\CommonHelp;

$title = "联系我们";
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
                'attributes' => [
                    [
                        'label' => $model->myLabels('contactTel'),
                        'value' => isset($viewData['contactTel']) && !empty($viewData['contactTel']) ? $viewData['contactTel'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('contactPhone'),
                        'value' => isset($viewData['contactPhone']) && !empty($viewData['contactPhone']) ? $viewData['contactPhone'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('contactEmail'),
                        'value' => isset($viewData['contactEmail']) && !empty($viewData['contactEmail']) ? $viewData['contactEmail'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('contactAddressOne'),
                        'value' => isset($viewData['contactAddressOne']) && !empty($viewData['contactAddressOne']) ? $viewData['contactAddressOne'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('contactAddressTwo'),
                        'value' => isset($viewData['contactAddressTwo']) && !empty($viewData['contactAddressTwo']) ? $viewData['contactAddressTwo'] : "暂无", 
                    ],
                    [
                        'label' => $model->myLabels('contactAddressThree'),
                        'value' => isset($viewData['contactAddressThree']) && !empty($viewData['contactAddressThree']) ? $viewData['contactAddressThree'] : "暂无", 
                    ],                    
                ],
            ])
            ?>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>













