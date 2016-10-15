<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '个人信息-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
$this->registerCss('.x_normal_left {width:40%}');
?>
<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id"=>1]); ?>
        </div>
        <div class="x_section_r">
            <div class="x_top_content">
                <div class="row">
                    <table class="table table-bordered table-striped col-lg-12">
                        <caption>基本资料</caption>
                        <tbody>
                        <tr>
                            <td class="x_normal_left" valign="top"> 登录名称：</td>
                            <td class="x_normal_rigth"
                                valign="top"><?= Html::encode(Yii::$app->user->identity->username); ?></td>
                        </tr>
                        <tr>
                            <td class="x_normal_left" valign="top"> 邮箱：</td>
                            <td class="x_normal_rigth"
                                valign="top"></td>
                        </tr>                        
                        <tr>
                            <td class="x_normal_left" valign="top"> 头像：</td>
                            <td class="x_normal_rigth" valign="top">
                                <?php //if (!empty(Yii::$app->user->identity->head)): ?>
                                    <?php //Html::img(Url::home(true) . Yii::$app->user->identity->head, ['width' => '100px', 'height' => '100px']); ?>
                                <?php //else: ?>
                                    暂无头像
                                <?php //endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="x_normal_left" valign="top"> 最后登录时间：</td>
                            <td class="x_normal_rigth"
                                valign="top"></td>
                        </tr>
                        <tr>
                            <td class="x_normal_left" valign="top">
                                <div class="x_edit_info">
                                    <div class="x_edit_info_btn"><a href="<?= Url::to(['/manager/shop/update']); ?>">修改密码</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 展示店铺信息 end-->
    </div>
</div>