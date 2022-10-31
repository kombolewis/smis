<?php

/** @var yii\web\View $this */
/** @var StudentProgrammeCurriculum $dataProvider */

use app\models\generated\StudentProgrammeCurriculum;
use kartik\grid\GridView;
use kartik\grid\SerialColumn;

$gridColumns = [
    [
        'class' => SerialColumn::class,
        'contentOptions' => ['class' => 'kartik-sheet-style'],
        'width' => '36px',
        'header' => '',
        'headerOptions' => ['class' => 'kartik-sheet-style']
    ],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderAjax('./details/_prog-details', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
    ],
    ['attribute'=>'progCurriculum.programme.PROG_FULL_NAME','header'=>'Programme',],
    'REGISTRATION_NUMBER',
    ['attribute'=>'progCurriculum.PROG_CURRICULUM_DESC','header'=>'Curriculum',],
    ['attribute'=>'progCurriculum.gradingSystem.GRADING_SYSTEM_NAME','header'=>'Grading',],
];
?>
<div class="">

    <?php
    echo GridView::widget([
        'id' => 'programme-curriculum-details',
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // offset from top
        'pjax' => false,
        'responsive' => false,
        'striped' => false,
        'summary' => false,
        'condensed' => true,
        'hover' => true,
        'persistResize' => false,
    ]);
    ?>

</div>