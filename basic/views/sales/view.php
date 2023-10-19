<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */

$this->title = $model->salesId;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'salesId' => $model->salesId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'salesId' => $model->salesId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'salesId',
            'productId',
            'shopId',
            'sale',
            'Date',
            'salescol',
            'stockId',
        ],
    ]) ?>

</div>
