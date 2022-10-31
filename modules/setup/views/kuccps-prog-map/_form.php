<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KuccpsProgMap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuccps-prog-map-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prog_map_id')->textInput() ?>

    <?= $form->field($model, 'kuccps_prog_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uon_prog_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
