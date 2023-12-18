<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AnimalRace $model */

$this->title = 'Добавить тип животных';
$this->params['breadcrumbs'][] = ['label' => 'Типы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-race-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
