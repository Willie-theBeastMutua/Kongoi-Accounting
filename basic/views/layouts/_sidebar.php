<?php
/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */
use yii\bootstrap5\Nav;
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
?>


<aside class="shadow mr-auto">
    <?php 
    $isShop1Active = true;
    $isShop2Active = false;

    echo Nav::widget([
    'options' => [
       'class' => 'd-flex flex-column nav-pills'
    ],
    'items' => [
        [
            'label' => 'Enter Sales',
            'url' => ['/sales/create'],
        ],
        [
            'label' => 'View Sales',
            'url' => ['/sales/index'],
        ],
        [
        'label' => 'Add Stock',
        'url' => ['/stock/create'],
        ],
        [
        'label' => 'View Stock',
        'url' => ['/stock/index'],
        ]
]]); 
?>
</aside>