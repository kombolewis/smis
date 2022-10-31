<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\generated\Country */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'CODE' => $model->CODE], ['class' => 'btn btn-primary']) ?>
        <!--<?= Html::a('Delete', ['delete', 'CODE' => $model->CODE], [
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
            'CODE',
            'NAME',
            'CONTINENT',
            'REGION',
            'CODE2',
            'NATIONALITY',
        ],
    ]) ?>

</div>
