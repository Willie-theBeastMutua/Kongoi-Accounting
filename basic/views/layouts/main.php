<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->beginContent('@app/views/layouts/base.php');
?>
 <div class="flash-message">
    <?= Yii::$app->session->getFlash('error') ?>
</div>
<main class="d-flex">
    <?php echo $this->render('_sidebar') ?>
   
    
<div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        
        <?= $content ?>
        
    </div>
</main>
<?php $this->endContent() ?>
