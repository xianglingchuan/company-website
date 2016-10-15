<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemCategory */

$this->title = 'Update System Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
