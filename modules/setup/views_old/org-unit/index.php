<?php

use yii\grid\SerialColumn;
use app\models\generated\OrgUnit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\OrgUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Org Units';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a('Create Org Unit', ['create'], ['class' => 'btn btn-success float-end']) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
        GridView::widget(config: [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => SerialColumn::class],

                'UNIT_ID',
                'UNIT_CODE',
                'UNIT_NAME',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {update}',
//                    'urlCreator' => static function ($action, OrgUnit $model, $key, $index, $column) {
//                        return Url::toRoute([$action, 'UNIT_ID' => $model->UNIT_ID]);
//                    }
                ],
            ],
        ])
    ?>


</div>
