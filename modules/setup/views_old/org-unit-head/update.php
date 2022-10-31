<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\OrgUnitHead */

$this->title = 'Update Org Unit Head: ' . $model->UNIT_HEAD_ID;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Org Unit Heads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UNIT_HEAD_ID, 'url' => ['view', 'UNIT_HEAD_ID' => $model->UNIT_HEAD_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="org-unit-head-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
