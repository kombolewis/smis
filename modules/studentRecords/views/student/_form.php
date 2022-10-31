<?php

use app\models\generated\Country;
use app\models\generated\Sponsor;
use kartik\date\DatePicker;
use kartik\label\LabelInPlace;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Student */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
?>


<div class="bg-primary bg-opacity-10 border-primary border border-2 border-opacity-25 rounded">
    <div class="d-flex flex-md-row justify-content-between align-items-center m-3">

        <?php $form = ActiveForm::begin([
            'id' => 'a-form',
            'fieldConfig' => [
                'template' => '<div class="">{input}{error}</div>',
                'labelOptions' => ['class' => false, 'tag' => false,],
                'inputOptions' => ['class' => 'form-control', 'tag' => false, 'placeholder' => 'Needed'],
                'errorOptions' => ['class' => 'invalid-feedback'],
            ],
        ]); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'STUDENT_NUMBER', $config)->widget(LabelInPlace::class); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'SURNAME', $config)->widget(LabelInPlace::class); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'OTHER_NAMES', $config)->widget(LabelInPlace::class); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'GENDER')->widget(Select2::class, [
                    'data' => ['M' => 'MALE', 'F' => 'FEMALE'],
                    'options' => ['placeholder' => 'Select a Gender'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'NATIONALITY')->widget(Select2::class, [
                    'data' => ArrayHelper::map((array)Country::find()->all(), 'CODE', 'NATIONALITY'),
                    'options' => ['placeholder' => 'Select a Nationality'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'DOB')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'select birth date ...'],
                    'pickerIcon' => '<i class="bi bi-calendar2-week text-primary"></i>',
                    'removeIcon' => '<i class="bi bi-x-octagon-fill text-danger"></i>',
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'autoclose' => true,
                    ]
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'ID_NO', $config)->widget(LabelInPlace::class); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'PASSPORT_NO', $config)->widget(LabelInPlace::class); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'SPONSOR')->widget(Select2::class, [
                    'data' => ArrayHelper::map((array)Sponsor::find()->all(), 'SPONSOR_ID', 'SPONSOR_NAME'),
                    'options' => ['placeholder' => 'Select a Sponsor',],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
