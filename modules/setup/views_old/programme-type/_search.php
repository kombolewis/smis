<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\search\ProgrammeTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROG_TYPE_ID') ?>

    <?= $form->field($model, 'PROG_TYPE_CODE') ?>

    <?= $form->field($model, 'PROG_TYPE_NAME') ?>

    <?= $form->field($model, 'PROG_TYPE_ORDER') ?>

    <?= $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
