<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\generated\OrgUnitType */

$this->title = $model->UNIT_TYPE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Org Unit Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="org-unit-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID], ['class' => 'btn btn-primary']) ?>
        <!--<?= Html::a('Delete', ['delete', 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'UNIT_TYPE_ID',
            'UNIT_TYPE_NAME',
            'STATUS',
        ],
    ]) ?>

</div>
