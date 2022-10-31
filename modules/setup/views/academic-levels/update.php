<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicLevels */

$this->title = 'Update Academic Levels: ' . $model->academic_level_id;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Academic Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->academic_level_id, 'url' => ['view', 'academic_level_id' => $model->academic_level_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academic-levels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
