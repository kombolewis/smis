<?php

namespace app\modules\setup\controllers;
use app\models\AcademicSessionSemester;
use app\models\search\AcademicSessionSemesterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AcademicSessionSemesterController implements the CRUD actions for AcademicSessionSemester model.
 */
class AcademicSessionSemesterController extends Controller
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
            ]
        );
    }

    /**
     * Lists all AcademicSessionSemester models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcademicSessionSemesterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcademicSessionSemester model.
     * @param int $acad_session_semester_id Acad Session Semester ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($acad_session_semester_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($acad_session_semester_id),
        ]);
    }

    /**
     * Creates a new AcademicSessionSemester model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcademicSessionSemester();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'acad_session_semester_id' => $model->acad_session_semester_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AcademicSessionSemester model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $acad_session_semester_id Acad Session Semester ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($acad_session_semester_id)
    {
        $model = $this->findModel($acad_session_semester_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'acad_session_semester_id' => $model->acad_session_semester_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AcademicSessionSemester model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $acad_session_semester_id Acad Session Semester ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($acad_session_semester_id)
    {
        $this->findModel($acad_session_semester_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AcademicSessionSemester model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $acad_session_semester_id Acad Session Semester ID
     * @return AcademicSessionSemester the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($acad_session_semester_id)
    {
        if (($model = AcademicSessionSemester::findOne(['acad_session_semester_id' => $acad_session_semester_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
