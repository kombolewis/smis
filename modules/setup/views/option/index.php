<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Options';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-index">

    <div class="card" >
        <div class="card-body">

            <div class="d-flex justify-content-end"> <?= Html::a('<i class="bi bi-plus-lg"></i> Create Option', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
            <h5 class="card-title mb-3"><?= Html::encode($this->title) ?> </h5>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'option_id',

            'option_code',
            'option_name',
            'degree_id',

            ['attribute'=>'option_desc',
                'label'=>'Option Description'],
//            'option_desc',
            //'option_status',
            //'progress_type',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Option $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'option_id' => $model->option_id]);
//                 }
//            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return  Html::a(' Update', ['/setup/option/update','option_id' => $model->option_id], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);
                    },
                ]

            ],


        ],
    ]); ?>


</div>
</div>
