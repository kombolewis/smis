<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\search\ProgrammeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROG_ID') ?>

    <?= $form->field($model, 'PROG_CODE') ?>

    <?= $form->field($model, 'PROG_SHORT_NAME') ?>

    <?= $form->field($model, 'PROG_FULL_NAME') ?>

    <?= $form->field($model, 'PROG_TYPE_ID') ?>

    <?php // echo $form->field($model, 'PROG_CAT_ID') ?>

    <?php // echo $form->field($model, 'PROG_PREFIX') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
