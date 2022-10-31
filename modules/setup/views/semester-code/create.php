<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SemesterCode */

$this->title = 'Create Semester Code';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Semester Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="semester-code-create">

    <div class="card" >
        <div class="card-body">
            <h5 class="card-title mb-3"> <?= Html::encode($this->title) ?></h5>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
