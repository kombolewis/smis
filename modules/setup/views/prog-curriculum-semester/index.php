<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProgCurriculumSemesterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Curriculum Semesters';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prog-curriculum-semester-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programme Curriculum Semester', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'prog_curriculum_semester_id',
                'label'=>'Programme Curriculum Semester ID'],

//            'prog_curriculum_semester_id',
//            'prog_curriculum_id',
            ['attribute'=>'prog_curriculum_id',
                'label'=>'Programme Curriculum  ID'],
            ['attribute'=>'acad_session_semester_id',
                'label'=>'Academic Session Semester ID'],
//            'acad_session_semester_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'prog_curriculum_semester_id' => $model->prog_curriculum_semester_id]);
                }
            ],
        ],
    ]); ?>


</div>
