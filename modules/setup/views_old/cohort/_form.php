<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Cohort */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cohort-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'COHORT_DESC')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
