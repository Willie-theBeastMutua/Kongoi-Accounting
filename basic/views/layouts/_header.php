<?php

/** @var yii\web\View $this */
/** @var string $content */


use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav '],
        'items' => [
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : 
                '<li class="navbar-nav">'
                . Html::beginForm(['/site/index'])
                . Html::submitButton(
                    'Upload ',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . Html::endForm()
                    . Html::beginForm(['/site/about'])
                    . Html::submitButton(
                        'Mpesa ',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                . Html::endForm()
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout ',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                   . '</li>',
           // ['label' => 'Contact', 'url' => ['/site/contact']],
            
        ]
    ]);
       
    
    NavBar::end();
    ?>