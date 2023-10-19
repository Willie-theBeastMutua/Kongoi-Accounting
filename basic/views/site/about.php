<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Mpesa Calc';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about div-index">
    <h3><?= Html::encode($this->title) ?></h3>
    <div>
        <h4>Shop 1:  <?=$shop1?> </h4>
        <h4>Shop 2:  <?=$shop2?> </h4>

    </div>
</div>
