<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OptionCourse */

$this->title = 'Update Option Course: ' . $model->option_course_id;
$this->params['breadcrumbs'][] = ['label' => 'Option Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->option_course_id, 'url' => ['view', 'option_course_id' => $model->option_course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="option-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
