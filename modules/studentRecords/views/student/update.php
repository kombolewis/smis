<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Student */

$this->title = 'Update Student: ' . $model->STUDENT_ID . ' '.$model->SURNAME;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "#{$model->STUDENT_ID} - {$model->SURNAME}", 'url' => ['view', 'STUDENT_ID' => $model->STUDENT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
