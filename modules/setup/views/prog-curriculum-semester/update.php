<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgCurriculumSemester */

$this->title = 'Update Prog Curriculum Semester: ' . $model->prog_curriculum_semester_id;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Prog Curriculum Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prog_curriculum_semester_id, 'url' => ['view', 'prog_curriculum_semester_id' => $model->prog_curriculum_semester_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prog-curriculum-semester-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
