<?php

use yii\grid\SerialColumn;
use app\models\generated\Cohort;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\CohortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cohorts';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cohort-index">

    <h2><?= Html::encode($this->title) ?><?= Html::a('Create Cohort', ['create'], ['class' => 'btn btn-success float-end']) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'COHORT_ID',
            'COHORT_DESC',
            [
                'class' => ActionColumn::class,
                'urlCreator' => static function ($action, Cohort $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'COHORT_ID' => $model->COHORT_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
