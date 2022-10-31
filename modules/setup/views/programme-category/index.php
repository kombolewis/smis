<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProgrammeCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Categories';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="programme-category-index">
    <div class="card" >
        <div class="card-body">

            <div class="d-flex justify-content-end">
                <?=
                    Html::a(
                        '<i class="bi bi-plus-lg"></i> Create Programme Category',
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
                            'attribute' => 'prog_cat_code',
                            'label' => 'Programme Category Code'

                        ],
                        [
                            'attribute' => 'prog_cat_name',
                            'label' => 'Programme Category Name'

                        ],
                        [
                            'attribute' => 'prog_cat_order',
                            'label' => 'Programme Category Order'

                        ],
                        'status',
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(
                                        ' Update',
                                        ['/setup/programme-category/update', 'prog_cat_id' => $model->prog_cat_id],
                                        ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']
                                    );
                                },
                            ]
                        ],
                ]]);?>
        </div>
    </div>

</div>
