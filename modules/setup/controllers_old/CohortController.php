<?php

namespace app\modules\setup\controllers;

use app\models\generated\Cohort;
use app\models\generated\search\CohortSearch;
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
     * @param string $COHORT_ID Cohort ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($COHORT_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($COHORT_ID),
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
                return $this->redirect(['view', 'COHORT_ID' => $model->COHORT_ID]);
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
     * @param string $COHORT_ID Cohort ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($COHORT_ID)
    {
        $model = $this->findModel($COHORT_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'COHORT_ID' => $model->COHORT_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cohort model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $COHORT_ID Cohort ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($COHORT_ID)
    {
        $this->findModel($COHORT_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cohort model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $COHORT_ID Cohort ID
     * @return Cohort the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($COHORT_ID)
    {
        if (($model = Cohort::findOne(['COHORT_ID' => $COHORT_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
