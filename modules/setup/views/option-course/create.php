<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OptionCourse */

$this->title = 'Create Option Course';
$this->params['breadcrumbs'][] = ['label' => 'Option Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
