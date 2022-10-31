<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicSessionSemester */

$this->title = 'Update Academic Session Semester: ' . $model->acad_session_semester_id;
$this->params['breadcrumbs'][] = ['label' => 'Academic Session Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->acad_session_semester_id, 'url' => ['view', 'acad_session_semester_id' => $model->acad_session_semester_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academic-session-semester-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
