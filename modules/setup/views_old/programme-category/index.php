<?php

use yii\grid\SerialColumn;
use app\models\generated\ProgrammeCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\ProgrammeCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Categories';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-category-index">

    <h3><?= Html::encode($this->title) ?><?= Html::a('Create Programme Category', ['create'], ['class' => 'btn btn-success float-end']) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'PROG_CAT_ID',
            'PROG_CAT_CODE',
            'PROG_CAT_NAME',
            'PROG_CAT_ORDER',
            'STATUS',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => static function ($action, ProgrammeCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PROG_CAT_ID' => $model->PROG_CAT_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
