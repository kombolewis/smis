<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Cohort */

$this->title = 'Update Cohort: ' . $model->COHORT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Cohorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->COHORT_ID, 'url' => ['view', 'COHORT_ID' => $model->COHORT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cohort-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
