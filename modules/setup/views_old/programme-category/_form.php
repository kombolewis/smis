<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgrammeCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROG_CAT_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_CAT_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROG_CAT_ORDER')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
