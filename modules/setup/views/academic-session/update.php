<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicSession */

$this->title = 'Update Academic Session: ' . $model->acad_session_id;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Academic Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->acad_session_id, 'url' => ['view', 'acad_session_id' => $model->acad_session_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academic-session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
