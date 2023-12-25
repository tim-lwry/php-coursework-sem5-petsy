<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */

$this->title = 'Профиль';
?>
<div class="user-index">

    <h1><?= Html::encode(Yii::$app->user->identity->username)?></h1>

    <br>

    <h3>Личная информация</h3>
    <div>
        <p>ФИО: <?=$data["FIO"]->name." ".$data["FIO"]->surname." ".$data["FIO"]->patronymic?></p>
        <?php if(isset($data["type"])) echo "<p>Должность: ".$data["type"]->type."</p>" ?>

    </div>
    
    <?php
    echo
    Html::beginForm(['/site/logout'])
     . Html::submitButton(
         'Выйти',
         ['class' => 'btn btn-secondary logout']
     )
     . Html::endForm()
    ?>

</div>
