<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrgUnitHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisation Unit Histories';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-history-index">

    <div class="card" >
        <div class="card-body">
   
            <div class="d-flex justify-content-end">
                <?=
                    Html::a(
                        '<i class="bi bi-plus-lg"></i> Create Organisation Unit History',
                        ['create'],
                        ['class' => 'btn btn-lg btn-primary align-right']
                    )?>
            </div>
        
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'orgUnit',
                            'label' => 'Organisation Unit Name',
                            'value' => 'orgUnit.unit_name',
                        ],
                        [
                            'attribute' => 'orgType',
                            'label' => 'Organisation Unit Type Name',
                            'value' => 'orgType.unit_type_name',
                        ],
                        'parent_id',
                        // 'successor_id',
                        [
                            'attribute' => 'unitHead',
                            'label' => 'Organisation Unit Head',
                            'value' => 'unitHead.unit_head_name',
                        ],
                        // 'unit_head_user_id',
                        'start_date',
                        // 'end_date',
                        // 'user_id',
                        // 'date_created',
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(
                                        ' Update',
                                        ['/setup/org-unit-history/update', 'org_unit_history_id' => $model->org_unit_history_id],
                                        ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']
                                    );
                                },
                            ]
                        ],
                    ]
                ]);
            ?>
        </div>
    </div>
</div>
