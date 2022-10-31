<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\OrgUnitHistory */

$this->title = 'Update Org Unit: ' . $model->orgUnit->UNIT_NAME;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Org Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orgUnit->UNIT_NAME, 'url' => ['view', 'id' => $model->ORG_UNIT_ID]];
$this->params['breadcrumbs'][] = 'Update';

$model->UNITCODE = $model->orgUnit->UNIT_CODE;
$model->UNITNAME = $model->orgUnit->UNIT_NAME;
?>
<div class="org-unit-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
