<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\search\ProgCurriculumSemesterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prog-curriculum-semester-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROG_CURRICULUM_SEMESTER_ID') ?>

    <?= $form->field($model, 'PROG_CURRICULUM_ID') ?>

    <?= $form->field($model, 'ACAD_SESSION_SEMESTER_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
