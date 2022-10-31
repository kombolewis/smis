<?php

use app\models\generated\OrgUnitHead;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\OrgUnitHeadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Org Unit Heads';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-head-index">

    <h3><?= Html::encode($this->title) ?><?= Html::a('Create Org Unit Head', ['create'], ['class' => 'btn btn-success float-end']) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'UNIT_HEAD_ID',
            'UNIT_HEAD_NAME',
            'STATUS',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => static function ($action, OrgUnitHead $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'UNIT_HEAD_ID' => $model->UNIT_HEAD_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
