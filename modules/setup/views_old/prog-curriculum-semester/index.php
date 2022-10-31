<?php

use app\models\generated\ProgCurriculumSemester;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\ProgCurriculumSemesterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prog Curriculum Semesters';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prog-curriculum-semester-index">

    <h3><?= Html::encode($this->title) ?><?= Html::a('Create Prog Curriculum Semester', ['create'], ['class' => 'btn btn-success float-end']) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PROG_CURRICULUM_SEMESTER_ID',
            'PROG_CURRICULUM_ID',
            'ACAD_SESSION_SEMESTER_ID',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update}',
                'urlCreator' => function ($action, ProgCurriculumSemester $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PROG_CURRICULUM_SEMESTER_ID' => $model->PROG_CURRICULUM_SEMESTER_ID]);
                 }
            ],
        ],
    ]); ?>


</div>
