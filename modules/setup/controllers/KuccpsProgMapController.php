<?php

namespace app\modules\setup\controllers;

use app\models\KuccpsProgMap;
use app\models\search\KuccpsProgMapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KuccpsProgMapController implements the CRUD actions for KuccpsProgMap model.
 */
class KuccpsProgMapController extends Controller
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
     * Lists all KuccpsProgMap models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KuccpsProgMapSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KuccpsProgMap model.
     * @param int $prog_map_id Prog Map ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prog_map_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($prog_map_id),
        ]);
    }

    /**
     * Creates a new KuccpsProgMap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new KuccpsProgMap();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prog_map_id' => $model->prog_map_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing KuccpsProgMap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prog_map_id Prog Map ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prog_map_id)
    {
        $model = $this->findModel($prog_map_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prog_map_id' => $model->prog_map_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KuccpsProgMap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prog_map_id Prog Map ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prog_map_id)
    {
        $this->findModel($prog_map_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KuccpsProgMap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prog_map_id Prog Map ID
     * @return KuccpsProgMap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prog_map_id)
    {
        if (($model = KuccpsProgMap::findOne(['prog_map_id' => $prog_map_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
