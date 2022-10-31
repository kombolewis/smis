<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgCurriculumSemester */

$this->title = $model->PROG_CURRICULUM_SEMESTER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Prog Curriculum Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prog-curriculum-semester-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PROG_CURRICULUM_SEMESTER_ID' => $model->PROG_CURRICULUM_SEMESTER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PROG_CURRICULUM_SEMESTER_ID' => $model->PROG_CURRICULUM_SEMESTER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PROG_CURRICULUM_SEMESTER_ID',
            'PROG_CURRICULUM_ID',
            'ACAD_SESSION_SEMESTER_ID',
        ],
    ]) ?>

</div>
