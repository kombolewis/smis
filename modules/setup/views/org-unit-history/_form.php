<?php

use yii\helpers\Html;
use app\models\OrgUnit;
use app\models\OrgUnitHead;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\models\OrgUnitTypes;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\OrgUnitHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="org-unit-history-form">

    <?php $form = ActiveForm::begin(); ?>
        
        <div class="row mb-2">
            <div class="col-md-12">
                <?php
                    $types = OrgUnit::find()->select(['unit_id', 'unit_name'])->asArray()->all();
                    $data = ArrayHelper::map($types, 'unit_id', 'unit_name');
                    echo $form
                        ->field($model, 'org_unit_id')
                        ->label('Organisation Unit Name', ['class'=>'mb-2 fw-bold'])
                        ->widget(Select2::classname(), [
                            'data' => $data,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select Organisation Unit Name ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                ?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <?php
                    $types = OrgUnitTypes::find()->select(['unit_type_id', 'unit_type_name'])->asArray()->all();
                    $data = ArrayHelper::map($types, 'unit_type_id', 'unit_type_name');
                    echo $form
                        ->field($model, 'org_type_id')
                        ->label('Organisation Unit Type Name', ['class'=>'mb-2 fw-bold'])
                        ->widget(Select2::classname(), [
                            'data' => $data,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select Organisation Unit Type Name ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'parent_id')
                    ->textInput(['maxlength' => true])
                    ->label('Parent', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'successor_id')
                    ->textInput(['maxlength' => true])
                    ->label('Successor', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-md-12">
                <?php
                    $types = OrgUnitHead::find()->select(['unit_head_id', 'unit_head_name'])->asArray()->all();
                    $data = ArrayHelper::map($types, 'unit_head_id', 'unit_head_name');
                    echo $form
                        ->field($model, 'unit_head_id')
                        ->label('Organisation Unit Head Name', ['class'=>'mb-2 fw-bold'])
                        ->widget(Select2::classname(), [
                            'data' => $data,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select Organisation Unit Head Name ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'unit_head_user_id')
                    ->textInput(['maxlength' => true])
                    ->label('Unit Head User', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'start_date')
                    ->textInput(['maxlength' => true])
                    ->label('Start Date', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'end_date')
                    ->textInput(['maxlength' => true])
                    ->label('End Date', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>



        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'user_id')
                    ->textInput(['maxlength' => true])
                    ->label('User', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
