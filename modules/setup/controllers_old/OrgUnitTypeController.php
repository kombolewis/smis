<?php

namespace app\modules\setup\controllers;

use app\models\generated\OrgUnitType;
use app\models\generated\search\OrgUnitTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrgUnitTypeController implements the CRUD actions for OrgUnitType model.
 */
class OrgUnitTypeController extends Controller
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
     * Lists all OrgUnitType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrgUnitTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrgUnitType model.
     * @param string $UNIT_TYPE_ID Unit Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($UNIT_TYPE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($UNIT_TYPE_ID),
        ]);
    }

    /**
     * Creates a new OrgUnitType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrgUnitType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrgUnitType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $UNIT_TYPE_ID Unit Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($UNIT_TYPE_ID)
    {
        $model = $this->findModel($UNIT_TYPE_ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'UNIT_TYPE_ID' => $model->UNIT_TYPE_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrgUnitType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $UNIT_TYPE_ID Unit Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($UNIT_TYPE_ID)
    {
        $this->findModel($UNIT_TYPE_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrgUnitType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $UNIT_TYPE_ID Unit Type ID
     * @return OrgUnitType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($UNIT_TYPE_ID)
    {
        if (($model = OrgUnitType::findOne(['UNIT_TYPE_ID' => $UNIT_TYPE_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
