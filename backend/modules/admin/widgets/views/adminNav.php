<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\SystemUser;

$currPath = '/' . Yii::$app->controller->module->id . '/' . Yii::$app->controller->id;
$active = [
    //首页
    '/admin/home/index/index' => ['/home/index', '/home/logs'],
    //系统管理
    '/admin/system/system-navigation/index' => ['/system/system-navigation', '/system/system-gift',
                                                '/system/system-user', '/system/system-wish', '/system/system-tag',
                                                '/system/system-ability', '/system/system-medal', '/system/system-feedback', '/system/system-weather', '/system/system-version'],
    //任务管理
    '/admin/task/task-execute/index' => [ '/task/task-setup', '/task/task-noviciate-setup', '/task/task-execute', '/task/task-execute-comment', '/task/task-execute-laud', '/task/task-plan', '/system/system-task', '/system/system-task-block', '/task/task-execute-ability'],
    //用户管理
    '/admin/user/user/index' => ['/user/user-wish', '/user/user-notice', '/user/user-medal', '/user/user', '/user/user-wechat', '/user/user-account', '/user/user-account-flow', '/user/user-account-integral-flow', '/user/user-gift', '/user/user-growup-record', '/user/user-images', '/user/user-ability'],
    //内容管理
    '/admin/system/system-category/index' => ['/system/system-category', '/system/system-article', '/system/system-book'],
    
    
    
];
if (!empty($nav)) {
    ArrayHelper::multisort($nav, ['sort', 'id'], [SORT_ASC, SORT_ASC]);
    foreach ($nav as $_nav) {
        $items[] = ['label' => '<span>' . $_nav->name . '</span>', 'url' => $_nav->path, 'active' => isset($active[$_nav->path]) && in_array($currPath, $active[$_nav->path])];
    }
}
?>
<div class="x_header_all">
    <div class="x_header">
        <div class="x_logo x_header_left">
           
                <?php //= Html::img('/style/img/index/logo.png') ?>
            <h2 style="margin-top: 15px;">京源佳益管理系统</h2>
        </div>
        <div class="x_header_right">
            <div class="x_header_right_top">
                <span class="x_hello"><?= !empty(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : "暂无"; ?>，您好！</span>
                <div class="x_exit">
                    <img src="/style/img/index/iconfont-tuichu.png">
                    <?php
                    echo Html::beginForm(['/site/logout'], 'post', ['style' => 'display: inline'])
                        . Html::submitButton(
                            '退出',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm();
                    ?>
                </div>
            </div>
            <div class="x_header_right_bottom">
                <?php
                echo Nav::widget([
                    'options' => ['class' => ''],
                    'items' => $items,
                    'encodeLabels' => false
                ]);
                ?>
            </div>
        </div>
        <div class="x_clear"></div>
    </div>
</div>