<?php

use app\models\generated\Country;
use app\models\generated\Sponsor;
use yii\grid\SerialColumn;
use app\models\generated\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
//exit;
/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search';
$this->params['breadcrumbs'][] = ['label' => 'Student Records', 'url' => ['/student-records']];
$this->params['breadcrumbs'][] = ['label' => 'Utilities',];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="student-index bg-white">

    <h2>
        <?= Html::encode($this->title) ?>
    </h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'itemLabelPlural' => 'Students', 'itemLabelSingle' => 'Student',
        'columns' => [
            ['class' => SerialColumn::class],

            'STUDENT_NUMBER',
            'REG_NUMBER',
            'SURNAME',
            'OTHER_NAMES',
            'GENDER',
            ['attribute' => 'NATIONALITY','filter' =>
                ArrayHelper::map(Country::find()->innerJoinWith(['students'])->orderBy('COUNTRIES.NATIONALITY')->all(),"CODE","NATIONALITY")],
            'DOB',
            'ID_NO',
            'PASSPORT_NO',
            ['attribute'=>'SPONSOR','value'=>function($e){return $e->sponsor->SPONSOR_NAME;},],
            [
                'class' => ActionColumn::class,
                'template' => '{student-details}',
                'buttons' => [
                    'student-details' => static function($url,Student $model) {
                        return Html::a('<i class="fas fa-eye"></i>',Url::toRoute(['student-details','id'=>$model->STUDENT_ID,],));
                    }
                ],
//                'urlCreator' => static function ($action, Student $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'STUDENT_ID' => $model->STUDENT_ID]);
//                }
            ],
        ],
    ]) ?>


</div>
