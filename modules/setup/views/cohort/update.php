<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Cohort */

$this->title = 'Update Cohort: ' . $model->cohort_desc;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Cohorts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cohort_id, 'url' => ['view', 'cohort_id' => $model->cohort_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cohort-update">
    <div class="card" >
        <div class="card-body">
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
