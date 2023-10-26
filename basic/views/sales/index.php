<?php

use app\models\Sales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index div-salesIndex">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'custom-table table-striped table-bordered zero-configuration',
        ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],      

            'salesId',
            [
                'attribute' => 'productId',
                'value' => function ($model) {
                    // Custom query to fetch product name based on productId
                    $product = Yii::$app->db->createCommand('SELECT productName FROM products WHERE productId = :productId')
                        ->bindValue(':productId', $model->productId)
                        ->queryScalar();
                    $statusId = Yii::$app->db->createCommand('SELECT statusId FROM stock where stockId = :stockId')
                         ->bindValue(':stockId', $model->stockId)
                         ->queryScalar();
                         
                    return $product;
                },
            ],
            [
                'attribute' => 'shopId',
                'value' => function ($model) {
                    // Custom query to fetch shop name based on shopId
                    $shop = Yii::$app->db->createCommand('SELECT shopName FROM shop WHERE shopId = :shopId')
                        ->bindValue(':shopId', $model->shopId)
                        ->queryScalar();
                    return $shop;
                },
            ],
            [
                'attribute' => 'stock.buyingPrice',
                'label' => 'Buying Price',
            ],
            'sale',
            'Date',
            //'salescol',
            'stockId',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete}',
                // {view}
                'buttons' => [
                    // 'view' => function ($url, $model) {
                    //     return Html::a('<i class="fas fa-eye"></i>', ['view', 'salesId' => $model->salesId], [
                    //         'title' => 'View',
                    //     ]);
                    // },
                    'update' => function ($url, $model) {
                        // Check your condition here and disable the button if the condition is met
                            $statusId = Yii::$app->db->createCommand('SELECT statusId FROM stock where stockId = :stockId')
                                ->bindValue(':stockId', $model->stockId)
                                ->queryScalar();
                            return (isset($statusId) && ($statusId == 1))? Html::a('<i class="fas fa-edit"></i>', ['update', 'salesId' => $model->salesId], [
                            ]): Html::a('<i class="fas fa-edit" disabled-icon"></i>');                        
                    },
                    // 'delete' => function ($url, $model) {
                    //     return Html::a('<i class="fas fa-trash"></i>', ['delete', 'stockId' => $model->stockId]);

                    // },
                ],
            ],
        ],
    ]); ?>


</div>
