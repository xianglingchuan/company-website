<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Models;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id.'-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id" => $master_navigation_id]);?>
        </div>
        <div class="x_section_r">
            <div class="x_prompt" style="margin-top:15px;border-bottom:none">
                <h2 style="margin-top:5px;"><?= Html::encode($this->title) ?></h2>	
            </div>
           <?= backend\modules\admin\widgets\AlertWidget::widget();?>
            <p style="float: right">
                <?= Html::a('修改', ['create', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
                <?= Html::a('删除', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => '确定删除吗?','method' => 'get']])?>
                <?= Html::a('返回', ['index'], ['class' => 'btn btn-default',])?>
            </p>
            

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
            'phone',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'head',
            'baby_name',
            'baby_sex',
            'baby_birthday',
            'bank_name',
            'bank_version',
            'bank_device_id',
            'wechat_openid',
            'is_del',
            'created_at',
            'created_uid',
            'updated_at',
            'updated_uid',
                ],
            ]) ?>
            
            
            
            <p style="float: right">
                <?= Html::a('修改', ['create', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
                <?= Html::a('删除', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => '确定删除吗?','method' => 'get']])?>
                <?= Html::a('返回', ['index'], ['class' => 'btn btn-default'])?>
            </p>   
        </div>
        <!-- 产品管理 end-->
    </div>
</div>













