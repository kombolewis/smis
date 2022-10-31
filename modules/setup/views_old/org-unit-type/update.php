<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\OrgUnitType */

$this->title = 'Update Org Unit Type: ' . $model->UNIT_TYPE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Org Unit Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->UNIT_TYPE_ID, 'url' => ['view', 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="org-unit-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
