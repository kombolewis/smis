<?php

namespace app\modules\setup\controllers;

use app\models\AcademicLevels;
use app\models\search\AcademicLevelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AcademicLevelsController implements the CRUD actions for AcademicLevels model.
 */
class AcademicLevelsController extends Controller
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
     * Lists all AcademicLevels models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcademicLevelsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcademicLevels model.
     * @param int $academic_level_id Academic Level ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($academic_level_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($academic_level_id),
        ]);
    }

    /**
     * Creates a new AcademicLevels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcademicLevels();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'academic_level_id' => $model->academic_level_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AcademicLevels model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $academic_level_id Academic Level ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($academic_level_id)
    {
        $model = $this->findModel($academic_level_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'academic_level_id' => $model->academic_level_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AcademicLevels model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $academic_level_id Academic Level ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($academic_level_id)
    {
        $this->findModel($academic_level_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AcademicLevels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $academic_level_id Academic Level ID
     * @return AcademicLevels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($academic_level_id)
    {
        if (($model = AcademicLevels::findOne(['academic_level_id' => $academic_level_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
