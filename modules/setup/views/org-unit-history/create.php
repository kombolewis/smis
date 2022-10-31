<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrgUnitHistory */

$this->title = 'Create Organisation Unit History';
$this->params['breadcrumbs'][] = ['label' => 'Org Unit Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-unit-history-create">

    <div class="card" >
        <div class="card-body">
            <h3 class="card-title mb-3">
            <?= Html::encode($this->title) ?></h3>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
