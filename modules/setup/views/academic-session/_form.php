<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acad_session_name')->textInput(['maxlength' => true])->label('Academic Session Name',['class'=>'mb-2 fw-bold']) ?>

    <?= $form->field($model, 'acad_session_desc')->textInput(['maxlength' => true])->label('Academic Session Description',['class'=>'mb-2 fw-bold']) ?>

<!--    <?//= $form->field($model, 'start_date')->textInput()->label('Start Date',['class'=>'mb-2 fw-bold']) ?>-->
    <?php echo $form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter start date ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy',
        ]
    ]);?>
<!--    <?//= $form->field($model, 'end_date')->textInput()->label('End Date',['class'=>'mb-2 fw-bold']) ?>-->
<?php echo $form->field($model, 'end_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter end date ...'],
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'dd-mm-yyyy',
    ]
]);?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success mt-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
