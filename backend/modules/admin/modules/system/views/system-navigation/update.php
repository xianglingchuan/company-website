<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemNavigation */

$this->title = 'Update System Navigation: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Navigations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-navigation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
