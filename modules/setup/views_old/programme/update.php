<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Programme */

$this->title = 'Update Programme: ' . $model->PROG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROG_ID, 'url' => ['view', 'PROG_ID' => $model->PROG_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
