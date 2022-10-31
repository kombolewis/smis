<?php
use app\models\OrgUnitHead;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrgUnitHeadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organisation Unit Heads';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-head-index">

    <div class="card" >
        <div class="card-body">
   
            <div class="d-flex justify-content-end">
                <?=
                    Html::a(
                        '<i class="bi bi-plus-lg"></i> Create Organisation Unit Head',
                        ['create'],
                        ['class' => 'btn btn-lg btn-primary align-right']
                    )
                ?>
            </div>
        
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>

            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'unit_head_name',
                        'status',
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(
                                        ' Update', 
                                        ['/setup/org-unit-head/update','unit_head_id' => $model->unit_head_id],
                                        ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']
                                    );
                                },
                            ]
                        ],
                ]]);?>
        </div>
    </div>
</div>