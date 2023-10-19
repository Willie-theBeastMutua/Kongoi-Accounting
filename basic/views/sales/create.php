<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sales $model */

$this->title = 'Create Sales';
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-create div-sales">

    <h1 style="color: #231276;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
