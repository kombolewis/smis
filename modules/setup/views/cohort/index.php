<?php

use yii\grid\SerialColumn;
use app\models\Cohort;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\CohortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cohorts';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cohort-index">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-end">  <?= Html::a('<i class="bi bi-plus-lg"></i> Create Cohort', ['create'], ['class' => 'btn btn-lg btn-primary align-right']) ?></h2>
            </div>
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            //'cohort_id',
            'cohort_desc',
//            [
//                'class' => ActionColumn::class,
//                'urlCreator' => static function ($action, Cohort $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'cohort_id' => $model->cohort_id]);
//                 }
//            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        //  dd($url);
                        return  Html::a(' Update', ['/setup/cohort/update','cohort_id' => $model->cohort_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);

                    },
                ]

            ],
        ],
    ]); ?>


</div>
</div>
