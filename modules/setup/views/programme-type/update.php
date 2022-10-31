<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeType */

$this->title = 'Update Programme Type: ' . $model->prog_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prog_type_id, 'url' => ['view', 'prog_type_id' => $model->prog_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programme-type-update">

    <div class="card" >
        <div class="card-body">
            <h5 class="card-title mb-3"> <?= Html::encode($this->title) ?></h5>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
