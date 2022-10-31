<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgrammeType */

$this->title = 'Update Programme Type: ' . $model->PROG_TYPE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROG_TYPE_ID, 'url' => ['view', 'PROG_TYPE_ID' => $model->PROG_TYPE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programme-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
