<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\search\ProgrammeCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programme-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROG_CAT_ID') ?>

    <?= $form->field($model, 'PROG_CAT_CODE') ?>

    <?= $form->field($model, 'PROG_CAT_NAME') ?>

    <?= $form->field($model, 'PROG_CAT_ORDER') ?>

    <?= $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
