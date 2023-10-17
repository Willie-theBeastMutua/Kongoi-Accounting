<?php

/** @var yii\web\View $this */
use yii\widgets\ActiveForm;


$this->title = 'KONGOI MPESA CALCULATOR';

?>
<div >
    <div class="div-index">
        
            <p class = "text-muted"> Please Upload KCB Excel File </p> 
            <?php $form= ActiveForm::begin([
                'options' => [
                    'enctype'=>'multipart/form-data',
                    'method'=>'POST'
                ]
            ])?>
            <?= $form->field($model, 'excel')->fileInput() ?>
            <button>Upload</button>
            <?php ActiveForm::end()?>        
    </div>

</div>

