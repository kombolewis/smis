<?php


/* @var $this yii\web\View */
/* @var $searchModel app\models\generated\search\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\generated\Sponsor;
use kartik\grid\GridView;
use kartik\grid\SerialColumn;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


$sponsors = ArrayHelper::map(Sponsor::find()->all(),"SPONSOR_ID",'SPONSOR_NAME');

$this->title = 'Students per Sponsor'. ' '. (($id !== 0)?' : ' .$sponsors[$id]:'');
$this->params['breadcrumbs'][] = ['label' => 'Student Records', 'url' => ['/student-records']];
$this->params['breadcrumbs'][] = ['label' => 'Reports'];
$this->params['breadcrumbs'][] = $this->title;


$url = Url::to(['/student-records/reports/students-per-sponsor']);
?>

<div class="">

    <h5>
        <?= Html::encode($this->title)  ?>
    </h5>
    <div class="clearfix">&nbsp;</div>
    <div>
        <?= Select2::widget([
            'name' => 'id',
            'value' => ($id?$id:''),
            'data' => $sponsors,
            'options' => [
                'placeholder' => 'Select Sponsor',
                'multiple' => false,
            ],
            'pluginOptions' => ['allowClear' => true],
            'pluginEvents' => [
                "change" => "function(e) { location.href='$url?id='+$(this).val(); }",
            ],
        ]);
        ?>
    </div>
    <hr>
    <div>
        <?= ($id !== 0) ? $this->render('_students-report-grid',['searchModel'=>$searchModel,'dataProvider'=>$dataProvider]):'';?>

    </div>
</div>
