<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\helpers\Models;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'user - '.Yii::$app->setting->get('siteName');
$this->registerCssFile(Url::to('/style/css/common.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCssFile(yii\helpers\Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
?>


<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id" => $master_navigation_id]); ?>
        </div>
        <!-- 产品管理 -->
        <div class="x_section_r">
            <div class="x_prompt" style="margin-top:15px;border-bottom:none">
                <h2 style="margin-top:5px;"><?= Html::encode('user') ?></h2>	
                <div class="x_add_product"><?= Html::a('添加', ['create']) ?></div>
            </div>

            <div class="x-time">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => ['index'], 'method' => 'get', 'options'=>["class"=>"navbar-form cs-search pull-right"]]); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">名称</label>
                    <?= Html::input("text", "name", (isset($params['name']) ? $params['name'] : ""), ["class" => "form-control"]); ?>
                </div>
                <button type="submit" class="x_btn btn btn-default">查询</button>
                <?php ActiveForm::end(); ?>
            </div>



            <div class="x_top_content" style="margin-top:15px;">
                <div class="row">
                    <?= backend\modules\admin\widgets\AlertWidget::widget(); ?>
                    
                    
                    
                                                                <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions' => ['class' => 'table table-bordered table-striped col-lg-12 x_product_table'],
                            'layout' => '{items}{pager}',                            
                            'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],

                                'id',
            'phone',
            'auth_key',
            'password_hash',
            'password_reset_token',
            // 'head',
            // 'baby_name',
            // 'baby_sex',
            // 'baby_birthday',
            // 'bank_name',
            // 'bank_version',
            // 'bank_device_id',
            // 'wechat_openid',
            // 'is_del',
            // 'created_at',
            // 'created_uid',
            // 'updated_at',
            // 'updated_uid',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                                                            
                </div>
            </div>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>