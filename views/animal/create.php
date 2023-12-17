<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Animal $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Животные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
