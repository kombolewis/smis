<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\CohortSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cohort-session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cohort_session_name')->textInput(['maxlength' => true])->label('Cohort Session Name',['class'=>'mb-2 fw-bold']) ?>

    <?= $form->field($model, 'cohort_id')->textInput()->label('Cohort Session ID',['class'=>'mb-2 fw-bold']) ?>

    <?= $form->field($model, 'prog_curriculum_semester_id')->textInput()->label('Programme Currriculum Semester Id',['class'=>'mb-2 fw-bold']) ?>

<!--    <?//= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>-->
    <?php echo $form->field($model, 'status')->label('Status',['class'=>'mb-2 fw-bold'])->widget(Select2::classname(), [
    'data' =>['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'],
    'language' => 'en',
    'options' => ['placeholder' => 'Select a status...'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success mt-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
