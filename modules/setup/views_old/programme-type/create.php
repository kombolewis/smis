<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\generated\ProgrammeType */

$this->title = 'Create Programme Type';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
