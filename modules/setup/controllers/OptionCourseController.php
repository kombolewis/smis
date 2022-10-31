<?php

namespace app\modules\setup\controllers;

use app\models\OptionCourse;
use app\models\search\OptionCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OptionCourseController implements the CRUD actions for OptionCourse model.
 */
class OptionCourseController extends Controller
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
     * Lists all OptionCourse models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OptionCourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OptionCourse model.
     * @param int $option_course_id Option Course ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($option_course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($option_course_id),
        ]);
    }

    /**
     * Creates a new OptionCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OptionCourse();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'option_course_id' => $model->option_course_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OptionCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $option_course_id Option Course ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($option_course_id)
    {
        $model = $this->findModel($option_course_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'option_course_id' => $model->option_course_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OptionCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $option_course_id Option Course ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($option_course_id)
    {
        $this->findModel($option_course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OptionCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $option_course_id Option Course ID
     * @return OptionCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($option_course_id)
    {
        if (($model = OptionCourse::findOne(['option_course_id' => $option_course_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
