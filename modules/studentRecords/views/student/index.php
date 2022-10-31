<?php

use app\models\generated\Country;
use app\models\generated\Sponsor;
use kartik\date\DatePicker;
use kartik\grid\DataColumn;
use Stidges\CountryFlags\CountryFlag;
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

$this->title = 'Students';
$this->params['breadcrumbs'][] = ['label' => 'Student Records', 'url' => ['/student-records']];
$this->params['breadcrumbs'][] = $this->title;

$dropDOptions = ['placeholder' => 'All', 'prompt' => 'All', 'class' => 'form-control',];
//exit;
?>
<div class="student-index bg-white">

    <h2>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Add New Student', ['create'], ['class' => 'btn btn-success float-end']) ?>
    </h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'itemLabelPlural' => 'Students', 'itemLabelSingle' => 'Student',
        'columns' => [
            ['class' => SerialColumn::class],

            ['attribute' => 'STUDENT_ID','width'=>'10px','class'=>DataColumn::class,],
            'STUDENT_NUMBER',
            'SURNAME',
            'OTHER_NAMES',
            ['attribute' => 'GENDER', 'filter' => Yii::$app->params['gender'],
                'filterInputOptions' => $dropDOptions,
            ],
            [
                'attribute' => 'NATIONALITY',
                'value' => function ($d) {
                    return (new CountryFlag)->get($d->nationality->CODE2) . ' ' . $d->nationality->NATIONALITY;
                },
                'filter' =>
                    ArrayHelper::map(Country::find()->innerJoinWith(['students'])->orderBy('COUNTRIES.NATIONALITY')->all(),
                        "CODE", function ($d) {
                            return (new CountryFlag)->get($d->CODE2) . ' ' . $d->NATIONALITY;
                        }),
                'filterInputOptions' => $dropDOptions,
            ],
            [
                'class'=> DataColumn::class,
                'attribute' => 'DOB',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
//                    'pickerButton'=>false,
                    'pluginOptions' => [
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'removeButton' => false,
                        'allowClear' => true, 'format' => 'dd-M-yyyy', 'endDate' => '0d', 'autoclose' => true,],
                ],
            ],
            'ID_NO',
            'PASSPORT_NO',
            [
                'attribute' => 'SPONSOR',
                'filter' => ArrayHelper::map(Sponsor::find()->all(), 'SPONSOR_ID', 'SPONSOR_NAME'),
                'filterInputOptions' => $dropDOptions,
                'value' => function ($e) {
                    return $e->sponsor->SPONSOR_NAME;
                },],
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => static function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'STUDENT_ID' => $model->STUDENT_ID]);
                }
            ],
        ],
    ]) ?>


</div>
