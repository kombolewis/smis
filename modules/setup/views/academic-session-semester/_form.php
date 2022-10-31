<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicSessionSemester */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-session-semester-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acad_session_id')->textInput() ?>

    <?= $form->field($model, 'semester_code')->textInput() ?>

    <?= $form->field($model, 'acad_session_semester_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
