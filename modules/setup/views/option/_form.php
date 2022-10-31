<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Option */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option_id')->textInput() ?>

    <?= $form->field($model, 'option_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'progress_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
