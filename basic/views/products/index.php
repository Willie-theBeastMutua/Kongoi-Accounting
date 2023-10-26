<?php

use app\models\products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index  div-salesIndex">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'custom-table table-striped table-bordered zero-configuration',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'productId',
            'productName',
            // 'deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'productId' => $model->productId]);
                 }
            ],
        ],
    ]); ?>


</div>
