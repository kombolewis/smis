<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProgrammeTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Types';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-type-index">

    <div class="card" >
        <div class="card-body">

            <div class="d-flex justify-content-end">
                <?=
                    Html::a(
                        '<i class="bi bi-plus-lg"></i> Create Programme Type',
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
                            'attribute' => 'prog_type_code',
                            'label' => 'Programme Type Code'

                        ],
                        [
                            'attribute' => 'prog_type_name',
                            'label' => 'Programme Type Name'

                        ],
                        [
                            'attribute' => 'prog_type_order',
                            'label' => 'Programme Type Order'

                        ],
                        'status',
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(
                                        ' Update',
                                        ['/setup/programme-type/update', 'prog_type_id' => $model->prog_type_id],
                                        ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']
                                    );
                                },
                            ]
                        ],
                ]]);?>
        </div>
    </div>

</div>
