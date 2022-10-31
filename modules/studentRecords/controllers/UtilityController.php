<?php

namespace app\modules\studentRecords\controllers;

use app\models\generated\Student;
use app\modules\studentRecords\models\search\StudentSearchUtility;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class UtilityController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ],
        );
    }

    public function actionStudentSearch()
    {
        $searchModel = new StudentSearchUtility();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('student-search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Student Details view after search is found
     * @param $id
     * @return string
     */
    public function actionStudentDetails($id)
    {
        $model = Student::findOne($id);
        return $this->render('search/_personal', [
            'model' => $model,
            'STUDENT_ID' => $id,
        ]);
    }
}
