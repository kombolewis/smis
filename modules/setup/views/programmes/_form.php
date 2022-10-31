<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProgrammeType;
use app\models\ProgrammeCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Programmes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programmes-form">

    <?php $form = ActiveForm::begin(); ?>
        
        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'prog_code')
                    ->textInput(['maxlength' => true])
                    ->label('Programme Code', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'prog_short_name')
                    ->textInput(['maxlength' => true])
                    ->label('Programme Short Name', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        
        <div class="row mb-2">
            <div class="col-md-12">
                <?= 
                    $form
                    ->field($model, 'prog_full_name')
                    ->textInput(['maxlength' => true])
                    ->label('Programme Full Name', ['class'=>'mb-2 fw-bold'])
                ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                <?php
                    $types = ProgrammeType::find()->select(['prog_type_id', 'prog_type_name'])->asArray()->all();
                    $data = ArrayHelper::map($types, 'prog_type_id', 'prog_type_name');
                    echo $form
                        ->field($model, 'prog_type_id')
                        ->label('Programme Type', ['class'=>'mb-2 fw-bold'])
                        ->widget(Select2::classname(), [
                            'data' => $data,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select programme type...'],
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
                    $categories = ProgrammeCategory::find()->select(['prog_cat_id', 'prog_cat_name'])->asArray()->all();
                    $data = ArrayHelper::map($categories, 'prog_cat_id', 'prog_cat_name');
                    echo $form
                    ->field($model, 'prog_cat_id')
                    ->label('Programme Category', ['class'=>'mb-2 fw-bold'])
                    ->widget(Select2::classname(), [
                        'data' => $data,
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select programme category...'],
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
                echo $form
                    ->field($model, 'status')
                    ->label('Status', ['class'=>'mb-2 fw-bold'])
                    ->widget(Select2::classname(), [
                        'data' =>['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'],
                        'language' => 'en',
                        'options' => ['placeholder' => 'Select a status...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
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
