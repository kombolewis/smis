<?php
use app\models\OrgUnitTypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrgUnitTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisation Unit Types';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-types-index">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <?= Html::a('<i class="bi bi-plus-lg"></i> Create Organisation Unit Type', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>

            <h3 class="card-title mb-3">
            <?= Html::encode($this->title) ?></h3>

            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'unit_type_name',
                        'status',
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(' Update', ['/setup/org-unit-types/update','unit_type_id' => $model->unit_type_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);
                                },
                            ]

                        ],
                    ],
                ]); 
            ?>
        </div>
    </div>
</div>