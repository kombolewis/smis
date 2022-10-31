<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Programme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROG_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_SHORT_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_FULL_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_TYPE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_CAT_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_PREFIX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
