<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\helpers\Models;

$title = "编辑联系我们";
$this->title = $title . " - " . Yii::$app->setting->get('siteName');
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
                            'action' => ['create'],
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
                    <div>
                        
                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactTel');?></label>
                                <div class="col-sm-5"><?php echo Html::input("text", "contactTel", $viewData['contactTel'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        

                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactPhone');?></label>
                                <div class="col-sm-5"><?php echo Html::input("text", "contactPhone", $viewData['contactPhone'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        
                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactEmail');?></label>
                                <div class="col-sm-5"><?php echo Html::input("text", "contactEmail", $viewData['contactEmail'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        
                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactAddressOne');?></label>
                                <div class="col-sm-8"><?php echo Html::input("text", "contactAddressOne", $viewData['contactAddressOne'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        
                        
                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactAddressTwo');?></label>
                                <div class="col-sm-8"><?php echo Html::input("text", "contactAddressTwo", $viewData['contactAddressTwo'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        
                        
                        <div class="form-group form-horizontal">
                            <div class="form-group form-horizontal">
                                <label class='col-sm-2 control-label'><?php echo $model->myLabels('contactAddressThree');?></label>
                                <div class="col-sm-8"><?php echo Html::input("text", "contactAddressThree", $viewData['contactAddressThree'], ["class"=>"form-control"]);?></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        
                        
                       
                    </div>
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'submit-button']); ?>                  
                    <?= Html::a('返回', ['index'], ['class' => 'btn btn-default']) ?>                    
                </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!-- 创建产品 end -->
    </div>
</div>