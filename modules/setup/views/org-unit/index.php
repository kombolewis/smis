<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrgUnitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisation Units';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-units-index">
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <?= Html::a(
                    '<i class="bi bi-plus-lg"></i> Create Organisation Unit',
                    ['create'],
                    ['class' => 'btn btn-bg btn-primary']) 
                ?>
            </div>
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>

            <?= 
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'unit_code',
                        'unit_name',
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(' Update', ['/setup/org-unit/update','unit_id' => $model->unit_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);
                                },
                            ]
                        ],
                    ],
                ]); 
            ?>


        </div>
    </div>
</div>
