<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CONTINENT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REGION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODE2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NATIONALITY')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
