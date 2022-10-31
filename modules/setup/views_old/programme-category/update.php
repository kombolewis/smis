<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgrammeCategory */

$this->title = 'Update Programme Category: ' . $model->PROG_CAT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROG_CAT_ID, 'url' => ['view', 'PROG_CAT_ID' => $model->PROG_CAT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programme-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
