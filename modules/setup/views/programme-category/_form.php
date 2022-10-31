<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row mb-2">
        <div class="col-md-12">
            <?= $form->field($model, 'prog_cat_code')->textInput(['maxlength' => true])->label('Programme Category Code', ['class'=>'mb-2 fw-bold'])?>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-12">
            <?= $form->field($model, 'prog_cat_name')->textInput(['maxlength' => true])->label('Programme Category Name', ['class'=>'mb-2 fw-bold'])?>
        </div>
    </div>

    
    <div class="row mb-2">
        <div class="col-md-12">
            <?= $form->field($model, 'prog_cat_order')->textInput(['maxlength' => true])->label('Programme Category Order', ['class'=>'mb-2 fw-bold'])?>
        </div>
    </div>


    <div class="row mb-2">
        <div class="col-md-12">
        <?php
            echo $form->field($model, 'status')->label('Status', ['class'=>'mb-2 fw-bold'])->widget(Select2::classname(), [
                'data' =>['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'],
                'language' => 'en',
                'options' => ['placeholder' => 'Select a status...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
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
