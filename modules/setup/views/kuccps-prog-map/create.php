<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KuccpsProgMap */

$this->title = 'Create Kuccps Programme Map';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'KUCCPS Programme Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuccps-prog-map-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
