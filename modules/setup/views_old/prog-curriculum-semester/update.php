<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgCurriculumSemester */

$this->title = 'Update Prog Curriculum Semester: ' . $model->PROG_CURRICULUM_SEMESTER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Prog Curriculum Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROG_CURRICULUM_SEMESTER_ID, 'url' => ['view', 'PROG_CURRICULUM_SEMESTER_ID' => $model->PROG_CURRICULUM_SEMESTER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prog-curriculum-semester-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
