<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AnimalRace $model */

$this->title = 'Обновить тип: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тип', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="animal-race-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
