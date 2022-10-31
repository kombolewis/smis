<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgrammeCategory */

$this->title = 'Create Programme Category';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
