<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgCurriculumSemester */

$this->title = 'Create Programme Curriculum Semester';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Prog Curriculum Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prog-curriculum-semester-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
