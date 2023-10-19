<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productId')->textInput() ?>

    <?= $form->field($model, 'shopId')->textInput() ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'salescol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stockId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
