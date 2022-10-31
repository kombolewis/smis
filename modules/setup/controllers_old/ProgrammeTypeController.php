<?php

namespace app\modules\setup\controllers;

use app\models\generated\ProgrammeType;
use app\models\generated\search\ProgrammeTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgrammeTypeController implements the CRUD actions for ProgrammeType model.
 */
class ProgrammeTypeController extends Controller
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
     * Lists all ProgrammeType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgrammeTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProgrammeType model.
     * @param string $PROG_TYPE_ID Prog Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PROG_TYPE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PROG_TYPE_ID),
        ]);
    }

    /**
     * Creates a new ProgrammeType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProgrammeType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PROG_TYPE_ID' => $model->PROG_TYPE_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProgrammeType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $PROG_TYPE_ID Prog Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PROG_TYPE_ID)
    {
        $model = $this->findModel($PROG_TYPE_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PROG_TYPE_ID' => $model->PROG_TYPE_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgrammeType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PROG_TYPE_ID Prog Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PROG_TYPE_ID)
    {
        $this->findModel($PROG_TYPE_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProgrammeType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $PROG_TYPE_ID Prog Type ID
     * @return ProgrammeType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PROG_TYPE_ID)
    {
        if (($model = ProgrammeType::findOne(['PROG_TYPE_ID' => $PROG_TYPE_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
