<?php

use app\models\generated\OrgUnitType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\OrgUnitTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Org Unit Types';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-type-index">

    <h3><?= Html::encode($this->title) ?><?= Html::a('Create Org Unit Type', ['create'], ['class' => 'btn btn-success float-end']) ?></h3>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'UNIT_TYPE_ID',
            'UNIT_TYPE_NAME',
            'STATUS',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => function ($action, OrgUnitType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
