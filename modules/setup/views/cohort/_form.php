<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Cohort */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cohort-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cohort_desc')->textInput(['maxlength' => true])->label('Cohort Description',['class'=>'mb-2 fw-bold']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success mt-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
