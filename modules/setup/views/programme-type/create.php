<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeType */

$this->title = 'Create Programme Type';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Programme Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-type-create">

    <div class="card" >
        <div class="card-body">
            <h5 class="card-title mb-3"> <?= Html::encode($this->title) ?></h5>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
