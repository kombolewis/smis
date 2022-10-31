<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AcademicLevelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academic Levels';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-levels-index">



    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>

            </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'academic_level_id',
            'academic_level',
            'academic_level_name',
            'academic_level_order',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'academic_level_id' => $model->academic_level_id]);
                 }
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return  Html::a(' Update', ['/setup/academic-levels/update','academic_level_id' => $model->academic_level_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);
                    },
                ]

            ],
        ],
    ]); ?>


</div>
</div>
</div>
