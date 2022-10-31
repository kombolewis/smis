<?php
use app\models\Programmes;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProgrammesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programmes';
$this->params['breadcrumbs'][] = ['label' => 'Setup', 'url' => ['/setup']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programmes-index">
    <div class="card" >
        <div class="card-body">
   
            <div class="d-flex justify-content-end">
                <?=
                    Html::a(
                        '<i class="bi bi-plus-lg"></i> Create A Programme',
                        ['create'],
                        ['class' => 'btn btn-lg btn-primary align-right']
                    )?>
            </div>
        
            <h3 class="card-title mb-3"><?= Html::encode($this->title) ?></h3>
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'prog_code',
                            'label' => 'Programme Code'

                        ],
                        [
                            'attribute' => 'prog_short_name',
                            'label' => 'Programme Short Name'

                        ],
                        [
                            'attribute' => 'prog_full_name',
                            'label' => 'Programme Full Name'

                        ],
                        [
                            'attribute' => 'progType',
                            'label' => 'Programme Type',
                            'value' => 'progType.prog_type_name',
                        ],
                        [
                            'attribute' => 'progCat',
                            'label' => 'Programme Category',
                            'value' => 'progCat.prog_cat_name',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return  Html::a(
                                        ' Update',
                                        ['/setup/programmes/update', 'prog_id' => $model->prog_id],
                                        ['class' => ' bi bi-pencil-square btn btn-outline-primary btn-sm']
                                    );
                                },
                            ]
                        ],
                ]]);?>
        </div>
    </div>
</div>
