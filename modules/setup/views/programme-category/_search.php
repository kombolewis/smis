<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProgrammeCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prog_cat_id') ?>

    <?= $form->field($model, 'prog_cat_code') ?>

    <?= $form->field($model, 'prog_cat_name') ?>

    <?= $form->field($model, 'prog_cat_order') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
