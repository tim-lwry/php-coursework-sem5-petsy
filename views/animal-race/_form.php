<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AnimalRace $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="animal-race-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'race')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
