<?php

namespace app\modules\setup\controllers;

use app\models\generated\OrgUnitHead;
use app\models\generated\search\OrgUnitHeadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrgUnitHeadController implements the CRUD actions for OrgUnitHead model.
 */
class OrgUnitHeadController extends Controller
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
     * Lists all OrgUnitHead models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrgUnitHeadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrgUnitHead model.
     * @param string $UNIT_HEAD_ID Unit Head ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($UNIT_HEAD_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($UNIT_HEAD_ID),
        ]);
    }

    /**
     * Creates a new OrgUnitHead model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrgUnitHead();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'UNIT_HEAD_ID' => $model->UNIT_HEAD_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrgUnitHead model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $UNIT_HEAD_ID Unit Head ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($UNIT_HEAD_ID)
    {
        $model = $this->findModel($UNIT_HEAD_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'UNIT_HEAD_ID' => $model->UNIT_HEAD_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrgUnitHead model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $UNIT_HEAD_ID Unit Head ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($UNIT_HEAD_ID)
    {
        $this->findModel($UNIT_HEAD_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrgUnitHead model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $UNIT_HEAD_ID Unit Head ID
     * @return OrgUnitHead the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($UNIT_HEAD_ID)
    {
        if (($model = OrgUnitHead::findOne(['UNIT_HEAD_ID' => $UNIT_HEAD_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
