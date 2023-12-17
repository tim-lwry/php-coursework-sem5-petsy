<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Petsy - приют для бездомных животных.
    </p>
    <p>
        При возникновении вопросов обратитесь по телефону:<br>
        <span style="font-weight: bold; color: cornflowerblue;">+7 (123)-457-8080</span>
    </p>
    <!-- <code><?= __FILE__ ?></code> -->
</div>
