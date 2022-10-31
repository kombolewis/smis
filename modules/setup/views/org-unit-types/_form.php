<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\OrgUnitTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="org-unit-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
        $form
        ->field($model, 'unit_type_name')
        ->textInput(['maxlength' => true])
        ->label(
            'Unit Type Name',
            ['class'=>'mb-2 fw-bold']
        )
    ?>

   <?php
        echo $form
        ->field($model, 'status')
        ->label(
            'Status',
            ['class'=>'mb-2 fw-bold']
        )
        ->widget(Select2::classname(), [
            'data' =>['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'],
            'language' => 'en',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group mt-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
