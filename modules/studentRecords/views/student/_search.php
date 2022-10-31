<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\generated\search\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'STUDENT_ID') ?>

    <?= $form->field($model, 'STUDENT_NUMBER') ?>

    <?= $form->field($model, 'SURNAME') ?>

    <?= $form->field($model, 'OTHER_NAMES') ?>

    <?= $form->field($model, 'GENDER') ?>

    <?php // echo $form->field($model, 'NATIONALITY') ?>

    <?php // echo $form->field($model, 'DOB') ?>

    <?php // echo $form->field($model, 'ID_NO') ?>

    <?php // echo $form->field($model, 'PASSPORT_NO') ?>

    <?php // echo $form->field($model, 'BIRTH_CERT_NO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
