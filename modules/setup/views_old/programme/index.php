<?php

use app\models\generated\Programme;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\ProgrammeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programmes';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('Create Programme', ['create'], ['class' => 'btn btn-success float-end']) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PROG_ID',
            'PROG_CODE',
            'PROG_SHORT_NAME',
            'PROG_FULL_NAME',
            'PROG_TYPE_ID',
            'PROG_CAT_ID',
            'PROG_PREFIX',
            'STATUS',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Programme $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PROG_ID' => $model->PROG_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
