<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */
/** @var yii\widgets\ActiveForm $form */

$connection = Yii::$app->getDb();
$querystatusId = $connection->createCommand('SELECT statusId, statusName FROM status');
$statusdata = $querystatusId->queryAll();
$queryshopId = $connection->createCommand('SELECT shopId, shopName FROM shop');
$shopdata = $queryshopId->queryAll();
$userId = Yii::$app->user->id;
$queryuser = $connection->createCommand('SELECT userId, userName FROM user WHERE userId = :userId')
                            ->bindValue(':userId', $userId);
$userdata = $queryuser->queryAll();
$queryproductId = $connection->createCommand('SELECT productId, productName FROM products');
$productdata = $queryproductId->queryAll();
// print_r($userdata);
//  exit;
?>


<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'productId')->dropDownList(
        \yii\helpers\ArrayHelper::map($productdata,'productId', 'productName'), 
        ['class' => 'form-control']
    )?>

    <?= $form->field($model, 'statusId')->dropDownList(
        \yii\helpers\ArrayHelper::map($statusdata,'statusId', 'statusName'), 
        ['class' => 'form-control']
    )?>

    <?= $form->field($model, 'createdby')->dropDownList(
        \yii\helpers\ArrayHelper::map($userdata, 'userId', 'userName'), 
        ['class' => 'form-control']
    )?>    

    <?= $form->field($model, 'createDate')->textInput(['type'=>'date', 'max'=>date('Y-m-d')]) ?>

    <?= $form->field($model, 'shopId')->dropDownList(
        \yii\helpers\ArrayHelper::map($shopdata,'shopId', 'shopName'), 
        ['class' => 'form-control']
    )?>
    <?= $form->field($model, 'buyingPrice')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
