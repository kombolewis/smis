<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SemesterCode */

$this->title = 'Update Semester Code: ' . $model->semester_code;
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => 'Semester Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->semester_code, 'url' => ['view', 'semester_code' => $model->semester_code]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="semester-code-update">

    <div class="card" >
  		<div class="card-body">
    		<h5 class="card-title mb-3"><?= Html::encode($this->title) ?></h5>

			<?= $this->render('_form', [
                'model' => $model,
            ]) ?>

		</div>
	</div>

</div>
