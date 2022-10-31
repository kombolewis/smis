<?php

namespace app\modules\setup\controllers;
use app\models\ProgrammeCategory;
use app\models\search\ProgrammeCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgrammeCategoryController implements the CRUD actions for ProgrammeCategory model.
 */
class ProgrammeCategoryController extends Controller
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
     * Lists all ProgrammeCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgrammeCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProgrammeCategory model.
     * @param int $prog_cat_id Prog Cat ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prog_cat_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($prog_cat_id),
        ]);
    }

    /**
     * Creates a new ProgrammeCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProgrammeCategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prog_cat_id' => $model->prog_cat_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProgrammeCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prog_cat_id Prog Cat ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prog_cat_id)
    {
        $model = $this->findModel($prog_cat_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prog_cat_id' => $model->prog_cat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgrammeCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prog_cat_id Prog Cat ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prog_cat_id)
    {
        $this->findModel($prog_cat_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProgrammeCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prog_cat_id Prog Cat ID
     * @return ProgrammeCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prog_cat_id)
    {
        if (($model = ProgrammeCategory::findOne(['prog_cat_id' => $prog_cat_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
