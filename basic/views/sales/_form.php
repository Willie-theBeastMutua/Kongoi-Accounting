<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\Sales $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerCssFile("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
$this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js", ['depends' => [\yii\web\JqueryAsset::className()]]);

$connection = Yii::$app->getDb();
$queryProduct = $connection->createCommand('SELECT productId, productName FROM products');
$data = $queryProduct->queryAll();
$queryStock = $connection->createCommand('SELECT stockId, shopId FROM stock WHERE statusId = 1');
$dataStock = $queryStock->queryAll();
$queryshopId = $connection->createCommand('SELECT shopId, shopName FROM shop');
$datashopId = $queryshopId->queryAll();

$shopValue = Yii::$app->request->post('shop');
$model->shopId = $shopValue;
// date picker for selecting the date
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productId')->dropDownList(
        \yii\helpers\ArrayHelper::map($data,'productId', 'productName'), 
        ['class' => 'form-control']
    )?>
    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'Date')->textinput(['type'=>'date', 'max'=>date('Y-m-d')]) ?>
    

    <?= $form->field($model, 'stockId')->dropDownList(
        \yii\helpers\ArrayHelper::map($dataStock,'stockId', 'stockId'), 
        ['class' => 'form-control']
    ) ?>
   <?= $form->field($model, 'shopId')->dropDownList(
        yii\helpers\ArrayHelper::map($datashopId, 'shopId', 'shopName'),
        ['class' => 'form-control']
   ); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
