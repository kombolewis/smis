<?php

namespace app\modules\setup\controllers;

use app\models\Cohort;
use app\models\search\CohortSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CohortController implements the CRUD actions for Cohort model.
 */
class CohortController extends Controller
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
     * Lists all Cohort models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CohortSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cohort model.
     * @param int $cohort_id Cohort ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cohort_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cohort_id),
        ]);
    }

    /**
     * Creates a new Cohort model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cohort();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cohort_id' => $model->cohort_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cohort model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cohort_id Cohort ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cohort_id)
    {
        $model = $this->findModel($cohort_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cohort_id' => $model->cohort_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cohort model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cohort_id Cohort ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cohort_id)
    {
        $this->findModel($cohort_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cohort model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cohort_id Cohort ID
     * @return Cohort the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cohort_id)
    {
        if (($model = Cohort::findOne(['cohort_id' => $cohort_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
