<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = '产品管理-' . Yii::$app->setting->get('siteName');
$this->registerCssFile(yii\helpers\Url::to('/style/css/my_shop.css'), ['depends' => ['backend\assets\SystemAsset']]);
?>
<style type="text/css">
.x_normal_left01{width: 20%;}
</style>
<div class="x_section_all">
    <div class="x_section">
        <div class="x_section_left">
            <?= backend\modules\admin\widgets\AdminSideNav::widget(["id"=>1]); ?>
        </div>
        <!-- 产品管理 -->
        <div class="x_section_r">
            <div class="x_prompt" style="margin-top:15px;border-bottom:none">
                <h2 style="margin-top:5px;">产品管理</h2>
				<span style="margin-top:15px;    display: block;">
					<label>优化建议</label>
					<span>您的个人店铺已经在网站展示，补全店铺信息您就可以受到更多客户的信任</span>
				</span>
            </div>
            <div class="x_top_title_pro" style="margin-top:35px;">
                <div class="x_top_title_name">
                    <!-- <span>产品管理</span> -->
                    <p>赶快添加个人产品，添加后，您的个人店铺就可以免费展示在聚融亿网站<i>（最多可以添加5个产品）</i></p>
                </div>
                <div class="x_add_product"><?= Html::a('添加产品', ['/manager/product/create'])?></div>
            </div>
            <div class="x_top_content" style="margin-top:15px;">
                <div class="row">
                    <?php
//                    echo GridView::widget([
//                        'dataProvider' => $dataProvider,
//                        'tableOptions' => ['class' => 'table table-bordered table-striped col-lg-12 x_product_table'],
//                        'columns' => [
//                            // 数据提供者中所含数据所定义的简单的列
//                            // 使用的是模型的列的数据
//                            'name',
//                            'updated_at',
//                            /*[
//                                'label' => '最低推广价',
//                                'value' => function($data) {
//                                    return '100元/单';
//                                }
//                            ],*/
//                            [
//                                'class' => 'yii\grid\ActionColumn',
//                                'template' => '{update} {delete}',
//                                'buttons' => [
//                                    'update' => function ($url, $model, $key) {
//                                        return Html::a('编辑', $url, ['class' => 'x_delete_pro']);
//                                    },
//                                    'delete' => function ($url, $model, $key) {
//                                        return Html::a('删除', $url, ['class' => 'x_delete_extension']);
//                                    },
//                                ]
//                            ],
//                        ],
//                    ]);
                    ?>
                    <div class="x_show_single"><a href="<?= Url::to(['/manager/shop/show', 'id' => Yii::$app->user->identity->getId()]); ?>">查看个人店铺</a></div>
                </div>
            </div>
        </div>
        <!-- 产品管理 end-->
    </div>
</div>