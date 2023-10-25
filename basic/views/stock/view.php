<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */

$this->title = $model->stockId;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'stockId' => $model->stockId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'stockId' => $model->stockId], [
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
            'stockId',
            'productId',
            'statusId',
            'createdby',
            'createDate',
            'shopId',
            'buyingPrice',
        ],
    ]) ?>

</div>
