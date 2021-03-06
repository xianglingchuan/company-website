<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\helpers\Models;

$title = intval($model->id) >= 1 ? "修改文章" : "创建文章";
$this->title = $title . " - " . Yii::$app->setting->get('siteName');
$this->registerCssFile(Url::to(Yii::$app->homeUrl.'/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCssFile(Url::to(Yii::$app->homeUrl.'/style/css/common.css'), ['depends' => ['backend\assets\SystemAsset']]);

//加载编辑器样式
//这里必须重新加载3.0.3样式
//$this->registerCssFile(Url::to('/style/css/bootstrap.min.3.0.3.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCssFile(Url::to(Yii::$app->homeUrl.'/style/summernote/summernote.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerJsFile(Url::to(Yii::$app->homeUrl.'/style/summernote/summernote.js'), ['depends' => ['backend\assets\SystemAsset']]);
?>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />  
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

                        <?php
                        array_unshift($categoryList, ["id" => 0, "name" => "请选择分类"]);
                        echo $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categoryList, "id", "name"));
                        ?>
                        <?= $form->field($model, 'title',[
                           'template' =>'<div class="form-group form-horizontal">{label}<div class="col-sm-6">{input}</div>{error}</div><div class="hr-line-dashed"></div>',  
                           'labelOptions' => ['class' => 'col-lg-2 control-label'],                               
                        ])->textInput(); ?>  
                        
                        <?= $form->field($model, 'author')->textInput(); ?>
                        <?= $form->field($model, 'source')->textInput(); ?>
                        
                        <?= $form->field($model, 'short_basic_facts',[
                           'template' =>'<div class="form-group form-horizontal">{label}<div class="col-sm-6">{input}</div>{error}</div><div class="hr-line-dashed"></div>',  
                           'labelOptions' => ['class' => 'col-lg-2 control-label'],                               
                        ])->textArea(); ?>    
                        
                        
                        <?= $form->field($model, 'basic_facts',[
                           'template' =>'<div class="form-group form-horizontal">{label}<div class="col-sm-6">{input}</div>{error}</div><div class="hr-line-dashed"></div>',  
                           'labelOptions' => ['class' => 'col-lg-2 control-label'],                               
                        ])->textArea(); ?>  
                        
                        
                        <?= $form->field($model, 'describe',[
                           'template' =>'<div class="form-group form-horizontal">{label}<div class="col-sm-6">{input}</div>{error}</div><div class="hr-line-dashed"></div>',  
                           'labelOptions' => ['class' => 'col-lg-2 control-label'],                               
                        ])->textArea(); ?>
                        
                        
                        <div style="display: none"><?php echo $form->field($model, 'content', ['template' => "{input}"])->hiddenInput(['value' => "", 'id' => "content"]); ?></div>
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-lg-12">
                                <div class="widget-container fluid-height">
                                    <div class="heading" style="height:30px; padding-left: 50px;"><B style="float:left;"><?php echo $model->getAttributeLabel("content"); ?></B></div>
                                    <div class="widget-content padded">
                                        <div id="summernote"><?php echo $model->content; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?= $form->field($model, 'is_show')->dropDownList(Models::getIsShow()); ?>
                    </div>
                <?= $form->field($model, 'id', ['template' => "{input}"])->hiddenInput(['value' => isset($model->id) ? $model->id : 0]); ?>
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'submit-button', "onclick" => "mySubmit()"]); ?>
                <?= Html::a('返回', ['index'], ['class' => 'btn btn-default']) ?>                    
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!-- 创建产品 end -->
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            tabsize: 2,
            codemirror: {
                theme: 'monokai'
            }
        });
    });

    function mySubmit() {
        var sHTML = $('#summernote').code();
        $("#content").val(sHTML);
    }

</script>