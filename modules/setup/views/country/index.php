<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Countries';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="country-index">




        <div class="card" >
            <div class="card-body">

                <div class="d-flex justify-content-end">
                    <?= Html::a('<i class="bi bi-plus-lg"></i> Create Country', ['create'], ['class' => 'btn btn-lg btn-primary align-right']) ?>
                </div>
                <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country_code',
            'country_name',
            'continent',
            'region',
            'code2',
            //'nationality',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action,  $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'country_code' => $model->country_code]);
//                 }
//            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                  //  dd($url);
                        return  Html::a(' Update', ['/setup/country/update','country_code' => $model->country_code], ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']);

                    },
                ]

            ],
        ],
    ]); ?>


</div>
</div>
</div>
