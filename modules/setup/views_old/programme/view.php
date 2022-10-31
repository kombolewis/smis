<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Programme */

$this->title = $model->PROG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="programme-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PROG_ID' => $model->PROG_ID], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'PROG_ID' => $model->PROG_ID], [
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
            'PROG_ID',
            'PROG_CODE',
            'PROG_SHORT_NAME',
            'PROG_FULL_NAME',
            'PROG_TYPE_ID',
            'PROG_CAT_ID',
            'PROG_PREFIX',
            'STATUS',
        ],
    ]) ?>

</div>
