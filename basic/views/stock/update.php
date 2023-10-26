<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */

$this->title = 'Update Stock: ' . $model->stockId;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stockId, 'url' => ['view', 'stockId' => $model->stockId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update div-sales">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
