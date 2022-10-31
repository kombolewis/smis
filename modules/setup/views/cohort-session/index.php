<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CohortSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cohort Sessions';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cohort-session-index">

    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <?= Html::a('<i class="bi bi-plus-lg"></i> Create Cohort Session', ['create'], ['class' => 'btn btn-success']) ?></div>
            <h3 class="card-title mb-3">
                <?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cohort_session_id',
            'cohort_session_name',
            'cohort_id',
            'prog_curriculum_semester_id',
            'status',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'cohort_session_id' => $model->cohort_session_id]);
//                 }
//            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return  Html::a(' Update', ['/setup/cohort-session/update','cohort_session_id' => $model->cohort_session_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);
                    },
                ]

            ],
        ],
    ]); ?>


</div>
</div>
</div>
