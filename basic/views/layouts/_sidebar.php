<?php
/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar
?>


<aside class="shadow mr-auto">
    <?php echo Nav::widget([
    'options' => [
        'class' => 'd-flex flex-column nav-pills'
    ],
    'items' => [
        [
            'label' => 'Shop 1',
            'url' => ['/sales/create']
        ],
        [
            'label' => 'Shop 2',
            'url' => ['/site/about']
        ]
    ]
]) ?>
</aside>