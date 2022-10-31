<?php

use yii\grid\SerialColumn;
use app\models\generated\ProgrammeType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\ProgrammeTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Types';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-type-index">

    <h3><?= Html::encode($this->title) ?><?= Html::a('Create Programme Type', ['create'], ['class' => 'btn btn-success float-end']) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'PROG_TYPE_ID',
            'PROG_TYPE_CODE',
            'PROG_TYPE_NAME',
            'PROG_TYPE_ORDER',
            'STATUS',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => static function ($action, ProgrammeType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PROG_TYPE_ID' => $model->PROG_TYPE_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
