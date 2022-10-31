<?php

namespace app\modules\setup\controllers;

use app\models\generated\Programme;
use app\models\generated\search\ProgrammeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgrammeController implements the CRUD actions for Programme model.
 */
class ProgrammeController extends Controller
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
     * Lists all Programme models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgrammeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programme model.
     * @param string $PROG_ID Prog ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PROG_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PROG_ID),
        ]);
    }

    /**
     * Creates a new Programme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Programme();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PROG_ID' => $model->PROG_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $PROG_ID Prog ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PROG_ID)
    {
        $model = $this->findModel($PROG_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PROG_ID' => $model->PROG_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PROG_ID Prog ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PROG_ID)
    {
        $this->findModel($PROG_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Programme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $PROG_ID Prog ID
     * @return Programme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PROG_ID)
    {
        if (($model = Programme::findOne(['PROG_ID' => $PROG_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
