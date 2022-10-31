<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OptionCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="option-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option_course_id')->textInput() ?>

    <?= $form->field($model, 'option_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'prog_cur_id')->textInput() ?>

    <?= $form->field($model, 'course_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
