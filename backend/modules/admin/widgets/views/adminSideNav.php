<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
$currPath = "/admin/".Yii::$app->controller->module->id . '/' . Yii::$app->controller->id."/";
if (!empty($nav)) {
    ArrayHelper::multisort($nav, ['sort', 'id'], [SORT_ASC, SORT_ASC]);
    foreach ($nav as $_nav) {
        $value = strpos($_nav->path, $currPath)===false ? false : true;
        $items[] = ['label' => '<span>' . $_nav->name . '</span>', 'url' => $_nav->path, 'active' =>  $value, "style"=>$_nav['style']];
    }
}
//echo Nav::widget([
//    'options' => ['class' => 'nch-sidebar-article-class'],
//    'items' => $items,
//    'encodeLabels' => false,
//]);
?>
<ul id="w0" class="nch-sidebar-article-class nav">
    <?php
    if(!empty($items)){
        foreach($items as &$buf){?>
            <li class="<?php echo $buf['active'] === true ? "active": "";?>"><i class="icon iconfont icon-<?php echo $buf['style']; ?>"></i><a href="<?php echo $buf['url']; ?>"><?php echo $buf['label']; ?></a></li>
        <?php }
    }
    ?>
</ul>


