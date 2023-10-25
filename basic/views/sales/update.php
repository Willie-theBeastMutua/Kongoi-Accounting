<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */

$this->title = 'Update Sales: ' . $model->salesId;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->salesId, 'url' => ['view', 'salesId' => $model->salesId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-update div-sales">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
