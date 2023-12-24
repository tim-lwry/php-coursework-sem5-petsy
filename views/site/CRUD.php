<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'CRUD';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="../animal">Животные</a>
    </p>
    <p>
        <a href="../user">Пользователи</a>
    </p>
    
    <!-- <code><?= __FILE__ ?></code> -->
</div>
