<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicLevels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-levels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'academic_level')->textInput()->label('Academic Level ',['class'=>'mb-2 fw-bold']) ?>

    <?= $form->field($model, 'academic_level_name')->textInput(['maxlength' => true])->label('Academic Level Name',['class'=>'mb-2 fw-bold']) ?>

    <?= $form->field($model, 'academic_level_order')->textInput()->label('Academic Level Order',['class'=>'mb-2 fw-bold']) ?>

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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success mt-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
