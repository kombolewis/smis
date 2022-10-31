<?php

namespace app\modules\setup\controllers;

use app\models\CohortSession;
use app\models\search\CohortSessionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CohortSessionController implements the CRUD actions for CohortSession model.
 */
class CohortSessionController extends Controller
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
     * Lists all CohortSession models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CohortSessionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CohortSession model.
     * @param int $cohort_session_id Cohort Session ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cohort_session_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cohort_session_id),
        ]);
    }

    /**
     * Creates a new CohortSession model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CohortSession();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cohort_session_id' => $model->cohort_session_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CohortSession model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cohort_session_id Cohort Session ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cohort_session_id)
    {
        $model = $this->findModel($cohort_session_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cohort_session_id' => $model->cohort_session_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CohortSession model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cohort_session_id Cohort Session ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cohort_session_id)
    {
        $this->findModel($cohort_session_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CohortSession model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cohort_session_id Cohort Session ID
     * @return CohortSession the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cohort_session_id)
    {
        if (($model = CohortSession::findOne(['cohort_session_id' => $cohort_session_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
