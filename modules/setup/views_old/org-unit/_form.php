<?php

use app\models\generated\OrgUnit;
use app\models\generated\OrgUnitHead;
use app\models\generated\OrgUnitHistory;
use app\models\generated\OrgUnitType;
use kartik\date\DatePicker;
use kartik\label\LabelInPlace;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model OrgUnitHistory */
/* @var $form ActiveForm */

$orgTypes = ArrayHelper::map(OrgUnitType::find()->all(), 'UNIT_TYPE_ID', 'UNIT_TYPE_NAME');
$orgHeads = ArrayHelper::map(OrgUnitHead::find()->all(), 'UNIT_HEAD_ID', 'UNIT_HEAD_NAME');
$orgUnits = ArrayHelper::map(OrgUnit::find()->all(), 'UNIT_ID', 'UNIT_NAME');

$config = ['template' => "{input}\n{error}\n{hint}"];
?>


<div class="bg-primary bg-opacity-10 border-primary border border-2 border-opacity-25 rounded">
    <div class="m-3">

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
                <?= $form->field($model, 'UNITCODE', $config)->widget(LabelInPlace::class, []) ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'UNITNAME', $config)->widget(LabelInPlace::class) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'ORG_TYPE_ID',$config)->widget(Select2::class, [
                    'data' => $orgTypes,
                    'options' => ['placeholder' => 'Select Org Type'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'PARENT_ID',$config)->widget(Select2::class, [
                    'data' => $orgUnits,
                    'options' => ['placeholder' => 'Select Parent Org Unit'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'UNIT_HEAD_ID')->widget(Select2::class, [
                    'data' => $orgHeads,
                    'options' => ['placeholder' => 'Select Org Unit Head'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'UNIT_HEAD_USER_ID')->widget(Select2::class, [
                    'data' => [0=>'--'],
                    'options' => ['placeholder' => 'Select Org Unit Head User'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-8">
                <?= DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'START_DATE',
                    'attribute2' => 'END_DATE',
                    'options' => ['placeholder' => 'Start date','tooltipStyleFeedback' => true,],
                    'options2' => ['placeholder' => 'End date'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'autoclose' => true,
                        'keepEmptyValues' => true,
                        'clearBtn' => true,
                    ]
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Are you sure you want to submit the form for saving?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
