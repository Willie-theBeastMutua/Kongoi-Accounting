<?php

use app\models\Stock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index div-salesIndex">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'custom-table table-striped table-bordered zero-configuration',
        ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'stockId',
            [
                'attribute' => 'productId',
                'value' => function ($model) {
                    // Custom query to fetch product name based on productId
                    $product = Yii::$app->db->createCommand('SELECT productName FROM products WHERE productId = :productId')
                        ->bindValue(':productId', $model->productId)
                        ->queryScalar();
                    return $product;
                },

            ],
            [
                'attribute' => 'statusId',
                'value' => function ($model) {
                    // Custom query to fetch product name based on productId
                    $status = Yii::$app->db->createCommand('SELECT statusName FROM status WHERE statusId = :statusId')
                        ->bindValue(':statusId', $model->statusId)
                        ->queryScalar();
                    return $status;
                },

            ],
            [
                'attribute' => 'createdby',
                'value' => function ($model) {
                    // Custom query to fetch product name based on productId
                    $username = Yii::$app->db->createCommand('SELECT userName FROM user WHERE userId = :userId')
                        ->bindValue(':userId', $model->createdby)
                        ->queryScalar();
                    return $username;
                },

            ],
            'createDate',
            'shopId',
            'buyingPrice',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete}',
                // {view}
                'buttons' => [
                    // 'view' => function ($url, $model) {
                    //     return Html::a('<i class="fas fa-eye"></i>', ['view', 'stockId' => $model->stockId], [
                    //         'title' => 'View',
                    //     ]);
                    // },
                    'update' => function ($url, $model) {
                        // Check your condition here and disable the button if the condition is met
                            return Html::a('<i class="fas fa-edit"></i>', ['update', 'stockId' => $model->stockId], [
                            ]);                     
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'stockId' => $model->stockId]);

                    },
                ],
            ],
        ],
    ]); ?>


</div>
