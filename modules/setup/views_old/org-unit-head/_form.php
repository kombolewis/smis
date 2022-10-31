<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\OrgUnitHead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="org-unit-head-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UNIT_HEAD_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
