<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Programmes */

$this->title = 'Update Programme: ' . $model->prog_short_name;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prog_id, 'url' => ['view', 'prog_id' => $model->prog_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programmes-update">

    <div class="card" >
        <div class="card-body">
            <h3 class="card-title mb-3"> <?= Html::encode($this->title) ?></h3>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
