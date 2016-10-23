<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\helpers\Models;


$title = "客户名称管理";
$this->title = $title . '-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(Url::to(Yii::$app->homeUrl.'/style/css/common.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCssFile(yii\helpers\Url::to(Yii::$app->homeUrl.'/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
?>


<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id" => $master_navigation_id]); ?>
        </div>
        <!-- 产品管理 -->
        <div class="x_section_r">
            <div class="x_prompt" style="margin-top:15px;border-bottom:none">
                <h2 style="margin-top:5px;"><?= Html::encode($title) ?></h2>	
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
                                'title',
                                'sort',
                                [
                                    'attribute' => 'is_show',
                                    'value' => function ($model){
                                         return Models::getIsShow($model->is_show);
                                     }
                                ], 
                                // 'created_at',
                                // 'created_uid',
                                // 'updated_at',
                                // 'updated_uid',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete} {view} {showhide}',
                                'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        return Html::a('编辑', "create?id=" . $key, ['class' => 'x_delete_pro']);
                                    },
                                     'delete' => function ($url, $model, $key) {
                                        return Html::a('删除', $url, ['class' => 'x_delete_extension']);
                                    },
                                    'view' => function ($url, $model, $key) {
                                        return Html::a('', $url, ['class' => 'glyphicon glyphicon-zoom-in', 'title'=>"详情"]);
                                    },                                            
                                    'showhide' => function($url, $model, $key){
                                        $value = $model->is_show == Models::IS_SHOW_YES ? Models::IS_SHOW_NO : Models::IS_SHOW_YES;
                                        $url = "show-hide?id=".$key."&value=".$value;
                                        $alt = $model->is_show == Models::IS_SHOW_YES ? "隐藏" : "显示";
                                        $class = $model->is_show == Models::IS_SHOW_YES ? "glyphicon glyphicon-eye-close" : "glyphicon glyphicon-eye-open";
                                        return Html::a('', $url, ['class' =>$class, 'title'=>$alt]);
                                    }       
                                ]
                            ], 
                            ],
                        ]); ?>
                                                            
                </div>
            </div>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>