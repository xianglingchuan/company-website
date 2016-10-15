<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$title = intval($model->id)>=1 ? "修改导航" : "创建导航";
$this->title = $title.'-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCssFile(Url::to('/style/css/common.css'), ['depends' => ['backend\assets\SystemAsset']]);
?>
<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
        <?= backend\modules\admin\widgets\AdminSideNav::widget(["id" => $master_navigation_id]); ?>
        </div>
        <!-- 创建产品 -->
        <div class="x_section_r">
            <div class="x_top_content">
                <?php
                $form = ActiveForm::begin(['id' => 'login-form',
                            'action' => ['/admin/system/system-navigation/create'],
                            'method' => 'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'],
                            'fieldConfig' => ['inputOptions' => ['class' => 'form-control'],
                                'labelOptions' => ['class' => "col-sm-2 control-label"],
                                'template' => '<div class="form-group form-horizontal">{label}<div class="col-sm-4">{input}</div>{error}</div><div class="hr-line-dashed"></div>'],
                ]);
                ?>
                <div class="row">
                    <div class="x_prompt cs-h2" style="margin-top:15px;border-bottom:none; border-bottom:1px #CCC solid; padding-bottom: 0px;">
		      <h2 style="margin-top:5px;"><?= $title; ?></h2>	
		    </div>
                    
                    
                    <?= backend\modules\admin\widgets\AlertWidget::widget(); ?>
                    <div >
                        <?php echo $form->field($model, 'name')->textInput(); ?>
                        <?php 
                        array_unshift($parentList, ["id"=>0, "name"=>"顶级导航"]);
                        echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map($parentList, "id", "name"), ['style' => 'width:200px']); 
                        ?>
                        <?php echo $form->field($model, 'style')->textInput(); ?>
                        <?php echo $form->field($model, 'path')->textInput(); ?>
                        <?php echo $form->field($model, 'sort')->textInput(); ?>
                    </div>
                    <?php echo $form->field($model, 'id', ['template' => "{input}"])->hiddenInput(['value' => isset($model->id) ? $model->id : 0]); ?>
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']); ?>
                    <?= Html::a('返回', ['/admin/system/system-navigation/index'], ['class' => 'btn btn-default']) ?>                    
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!-- 创建产品 end -->
    </div>
</div>


