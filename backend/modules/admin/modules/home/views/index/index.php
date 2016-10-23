<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '个人信息-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to(Yii::$app->homeUrl.'/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
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
                            <td class="x_normal_left" valign="top"> 登录名称：<BR><BR></td>
                            <td class="x_normal_rigth"
                                valign="top"><?= Html::encode(Yii::$app->user->identity->username); ?><BR><BR></td>
                        </tr>
                        <tr>
                            <td class="x_normal_left" valign="top"> 登录时间：</td>
                            <td class="x_normal_rigth" valign="top"><?php echo date("Y-m-d H:i:s",time());?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 展示店铺信息 end-->
    </div>
</div>