<?php

namespace app\modules\setup\controllers;

use app\models\SemesterCode;
use app\models\search\SemesterCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SemesterCodeController implements the CRUD actions for SemesterCode model.
 */
class SemesterCodeController extends Controller
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
     * Lists all SemesterCode models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SemesterCodeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemesterCode model.
     * @param int $semester_code Semester Code
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($semester_code)
    {
        return $this->render('view', [
            'model' => $this->findModel($semester_code),
        ]);
    }

    /**
     * Creates a new SemesterCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SemesterCode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'semester_code' => $model->semester_code]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SemesterCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $semester_code Semester Code
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($semester_code)
    {
        $model = $this->findModel($semester_code);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'semester_code' => $model->semester_code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SemesterCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $semester_code Semester Code
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($semester_code)
    {
        $this->findModel($semester_code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SemesterCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $semester_code Semester Code
     * @return SemesterCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($semester_code)
    {
        if (($model = SemesterCode::findOne(['semester_code' => $semester_code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
