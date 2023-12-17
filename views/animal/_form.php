<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use app\models\AnimalRace;


/** @var yii\web\View $this */
/** @var app\models\Animal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="animal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList(
        ['Ж'=>"Женский" , 'М'=>"Мужской"]
    );//textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'taken')->radioList(
        [1=>"Да" , 0=>"Нет"]
    ); ?>

    <!-- <?= $form->field($model, 'animal_race_fk')->textInput() ?> -->

    <?= $form->field($model, 'animal_race_fk')->dropDownList(
        ArrayHelper::map(AnimalRace::find()->all(), 'id', 'race')); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
