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
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} &nbsp;&nbsp; {delete}',
                'contentOptions' => ['style' => 'width: 100px;'],
                // {view}
                'buttons' => [
                    // 'view' => function ($url, $model) {
                    //     return Html::a('<i class="fas fa-eye"></i>', ['view', 'stockId' => $model->stockId], [
                    //         'title' => 'View',
                    //     ]);
                    // },
                    'update' => function ($url, $model) {
                        // Check your condition here and disable the button if the condition is met
                            return Html::a('<i class="fas fa-edit"></i>', ['update', 'stockId' => $model->productId], [
                            ]);                     
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'stockId' => $model->productId]);

                    },
                ],
            ],
        ],
    ]); ?>


</div>
