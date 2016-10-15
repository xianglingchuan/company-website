<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\Product;

$this->title = '编辑产品-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerJsFile(Url::to('/style/js/manager/manger-product.js'), ['depends' => ['backend\assets\SystemAsset']]);
?>
<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?php // php= frontend\widgets\ManagerMyShopNav::widget(); ?>
        </div>
        <!-- 创建产品 -->
        <div class="x_section_r">
            <div class="x_top_content">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'product-form',
                    'options' => ['enctype' => 'multipart/form-data'],
                    //'enableAjaxValidation' => true, //是否进行异步验证
                    'fieldConfig' => [
                        'template' => "{input}<div class=\"help-block\">{error}</div>",
                        'labelOptions' => ['class' => 'control-label'],
                    ]
                ]);
                ?>
                <div class="row">
                    <table class="table table-bordered table-striped col-lg-12">
                        <caption>
                            <h3>编辑您的个人信贷产品</h3>
                            <span>请勿将电话、邮件等隐私信息填写在产品信息中，平台会进行审核并删除不符合此要求的产品</span>
                            <br/>
                            <div class="mod-sub-info">基本信息<i>(全部为必填)</i></div>
                        </caption>
                        <tbody>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 产品名：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'name')->textInput(['style' => 'width:350px', 'maxlength' => 30, 'size' => 50]) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 所属公司简称：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'org_name')->textInput(['style' => 'width:350px', 'maxlength' => 30, 'size' => 50]) ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="x_normal_left01" valign="top"> 产品封面：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'cover')->fileInput(['style' => 'width:350px', 'maxlength' => 30, 'size' => 50]) ?>
                                <?php
//                                if(!empty($model->cover)){
//                                    echo Html::img("@web/".$model->cover,["style"=>"width:100px"]);
//                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="x_normal_left01" valign="top"> 广告语：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'slogan')->textInput(['maxlength' => 50, 'size' => 70]) ?>
                                <label class="x_label_info">请描述该产品的显著特征，例：材料齐全当天可放款，无任何前期费用。</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 产品类型：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'product_type')->dropDownList($model->getProductType(), ['prompt' => '请选择', 'style' => 'width:200px;']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 服务种类：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'serve_type')->dropDownList($model->getServeType(), ['prompt' => '请选择', 'style' => 'width:200px;']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 抵押或担保类型：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'assure_type')->dropDownList($model->getAssureType(), ['prompt' => '请选择', 'style' => 'width:200px;']) ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="x_normal_left01" valign="top"> 还款方式：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'repayment_way')->dropDownList($model->getRepaymentWay(), ['prompt' => '请选择', 'style' => 'width:200px;']) ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="x_normal_left01" valign="top"> 额度范围：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <div class="form-group">
                                    <?php // $form->field($model, 'range_min', ['template' => "{input} {label}", 'options' => ['style' => 'display:inline']])
                                        //->textInput(['class' => 'form-control', 'style' => 'width:100px; display:inline', 'maxlength' => 5, 'size' => 10])->label('万~'); ?>
                                    <?php // $form->field($model, 'range_max', ['template' => "{input} {label}<div class=\"help-block\">{error}</div>", 'options' => ['style' => 'display:inline']])
                                        //->textInput(['class' => 'form-control', 'style' => 'width:100px; display:inline', 'maxlength' => 5, 'size' => 10])->label('万'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 放款期限：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'loan_limit_min', ['template' => "{input} {label}", 'options' => ['style' => 'display:inline']])
                                    //->textInput(['class' => 'form-control', 'style' => 'width:100px; display:inline', 'maxlength' => 5, 'size' => 10])->label('月~'); ?>
                                <?php // $form->field($model, 'loan_limit_max', ['template' => "{input} {label} <div class=\"help-block\">{error}</div>", 'options' => ['style' => 'display:inline']])
                                    //->textInput(['class' => 'form-control', 'style' => 'width:100px; display:inline', 'maxlength' => 5, 'size' => 10])->label('月'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 一般放款时长：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'loan_time', ['template' => "{input} {label}<div class=\"help-block\">{error}</div>", 'options' => ['style' => 'display:inline']])
                                    //->textInput(['class' => 'form-control', 'style' => 'width:100px; display:inline', 'maxlength' => 5, 'size' => 10])->label('工作日'); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped col-lg-12">
                        <caption>
                            <div class="mod-sub-info">收费方式<i>(全部为必填)</i></div>
                        </caption>
                        <tbody>
                        <tr>
                            <td class="x_normal_left01" valign="top">平均每月综合费率：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'avgchage_month_type'), $model->avgchage_month_type == Product::RATE_TYPE_DEFINED, ['value' => Product::RATE_TYPE_DEFINED]) ?>
                                    【<?php // Html::textInput(Html::getInputName($model, 'avgchage_month_min'), Html::encode($model->avgchage_month_min), ['class' => 'x_radio_input', 'style' => 'width:30px; display:inline', 'maxlength' => 5, 'size' => 10]) ?>
                                    】
                                    <label>%~</label>
                                    【<?php // Html::textInput(Html::getInputName($model, 'avgchage_month_max'), Html::encode($model->avgchage_month_max), ['class' => 'x_radio_input', 'style' => 'width:30px; display:inline', 'maxlength' => 5, 'size' => 10]) ?>
                                    】
                                    <label>%</label>
                                </label>
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'avgchage_month_type'), $model->avgchage_month_type == Product::RATE_TYPE_INTERVIEW, ['value' => Product::RATE_TYPE_INTERVIEW]) ?>
                                    面议
                                </label>
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'avgchage_month_type'), $model->avgchage_month_type == Product::RATE_TYPE_NONE, ['value' => Product::RATE_TYPE_NONE]) ?>
                                    无此费用
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 一次性办理手续费：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'fee_oneoff_type'), $model->fee_oneoff_type == Product::RATE_TYPE_DEFINED, ['value' => Product::RATE_TYPE_DEFINED]) ?>
                                    【<?php // Html::textInput(Html::getInputName($model, 'fee_oneoff_min'), Html::encode($model->fee_oneoff_min), ['class' => 'x_radio_input', 'style' => 'width:30px; display:inline', 'maxlength' => 5, 'size' => 10]) ?>
                                    】
                                    <label>%~</label>
                                    【<?php // Html::textInput(Html::getInputName($model, 'fee_oneoff_max'), Html::encode($model->fee_oneoff_max), ['class' => 'x_radio_input', 'style' => 'width:30px; display:inline', 'maxlength' => 5, 'size' => 10]) ?>
                                    】
                                    <label>%</label>
                                </label>
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'fee_oneoff_type'), $model->fee_oneoff_type == Product::RATE_TYPE_INTERVIEW, ['value' => Product::RATE_TYPE_INTERVIEW]) ?>
                                    面议
                                </label>
                                <label class="x_radio_input_label">
                                    <?php // Html::radio(Html::getInputName($model, 'fee_oneoff_type'), $model->fee_oneoff_type == Product::RATE_TYPE_NONE, ['value' => Product::RATE_TYPE_NONE]) ?>
                                    无此费用
                                </label>
                            </td>
                        </tr>
                        
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped col-lg-12">
                        <caption>
                            <div class="mod-sub-info">产品信息<i>（请根据您的产品特点填写）</i></div>
                        </caption>
                        <tbody>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 申请条件：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'condition')->textarea(['style' => 'min-height:150px;', 'placeholder' => "1、年龄要求：\n2、收入要求：\n..."]) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 所需条件：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'material')->textarea(['style' => 'min-height:150px;', 'placeholder' => "1、身份证明：\n2、工作证明：\n..."]) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left01" valign="top"> 其他说明：</td>
                            <td class="x_normal_rigth01" valign="top">
                                <?php // $form->field($model, 'description')->textarea(['style' => 'min-height:150px;']) ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="mod-sub-info service-city">服务城市</div>
                    <div class="x_all_select">
                        <div class="checkbox_inline_all">
                            <div id="service_area_info" style="margin: 10px 0; text-align: left">
                                <?php
//                                if (!empty($model->service_area)) {
//                                    $serviceArea = explode(',', $model->service_area);
//                                    foreach ($serviceArea as $_area) {
//                                        echo '<span class="label label-info" style="margin:2px; padding:1px; display: inline">' . $_area . '</span>';
//                                    }
//                                }
                                ?>
                            </div>
                            <div style="text-align: left">
                                <a class="btn btn-sm btn-default range_modal" href="#modal-city"
                                   data-toggle="modal">选择服务城市</a>
                                <?php // $form->field($model, 'province')->hiddenInput(); ?>
                                <?php // $form->field($model, 'city')->hiddenInput(); ?>
                                <?php // $form->field($model, 'service_area')->hiddenInput(); ?>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped col-lg-12">
                        <caption>
                            <div class="mod-sub-info">产品准入信息<i>（正确设置准入信息，可以帮您获得更精准的贷款客户）</i></div>
                        </caption>
                        <tbody>
                        <tr>
                            <td class="x_normal_left01" valign="top">
                                <div class="mod-sub-info">
                                    <div class="modal-where-str">
                                        <?php // $this->render('getSubmitModalWhere',['data' => $modalWhereValue]); ?>
                                    </div>
                                    <div style="padding:10px;">
                                        <a class="btn btn-sm btn-default modal-where"
                                           onclick="Product.getModelWhere(<?php // $model->id; ?>)" href="#modal-where"
                                           data-toggle="modal">添加准入条件</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?= Html::submitButton('保存', ['class' => 'x_success_next']); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!-- 创建产品 end -->
    </div>
</div>
<!-- 弹出框 选择城市modal start -->
<?php //$this->render('_selectCity'); ?>
<!-- 弹出框 选择城市modal end-->

<!-- 弹出框 选择产品准入信息modal start -->
<div class="modal fade" id="modal-where" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<!-- 弹出框 选择产品准入信息modal end-->