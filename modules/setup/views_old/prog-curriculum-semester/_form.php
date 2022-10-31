<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgCurriculumSemester */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prog-curriculum-semester-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROG_CURRICULUM_SEMESTER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_CURRICULUM_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACAD_SESSION_SEMESTER_ID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
