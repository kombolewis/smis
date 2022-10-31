<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KuccpsProgMap */

$this->title = 'Update Kuccps Prog Map: ' . $model->prog_map_id;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'KUCCPS Programme Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prog_map_id, 'url' => ['view', 'prog_map_id' => $model->prog_map_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kuccps-prog-map-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
