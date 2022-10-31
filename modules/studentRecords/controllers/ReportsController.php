<?php

namespace app\modules\studentRecords\controllers;

use app\models\generated\Country;
use app\models\generated\search\StudentSearch;
use app\models\generated\Sponsor;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class ReportsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ],
        );
    }

    /**
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionStudentsPerSponsor($id=0)
    {
        if($id==='') {
            $id = 0;
        }
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['SPONSOR'=>$id]);
        $dataProvider->pagination = false;
        return $this->render('students-per-sponsor',[
            'id'=>$id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionStudentNationalityStats()
    {
        $data = Country::find()->alias("CN")->select(["CN.NATIONALITY","COUNT(*) STUDENT_COUNT"])
        ->innerJoinWith("students")->groupBy("CN.NATIONALITY")->asArray()->all();
        ;
        if(empty($data)){
            \Yii::$app->getSession()->setFlash('danger', [
                'type' => 'warning',
                'message' => 'No Data found!',
                'title' => 'Dependant Report',
            ]);
        }else{
            $columns = array_keys($data[0]);
            array_splice($columns,2);
        }

//        print_r($columns);exit;

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => false,
            'sort' => [
                'attributes' => $columns
            ],
        ]);
        return $this->render('student-nationality-stats', [
            'dataProvider'=> $dataProvider,
            'columns' => $columns,
        ]);

    }
}
