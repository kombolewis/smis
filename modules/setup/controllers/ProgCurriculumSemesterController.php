<?php

namespace app\modules\setup\controllers;
use app\models\ProgCurriculumSemester;
use app\models\search\ProgCurriculumSemesterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgCurriculumSemesterController implements the CRUD actions for ProgCurriculumSemester model.
 */
class ProgCurriculumSemesterController extends Controller
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
     * Lists all ProgCurriculumSemester models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgCurriculumSemesterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProgCurriculumSemester model.
     * @param int $prog_curriculum_semester_id Prog Curriculum Semester ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prog_curriculum_semester_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($prog_curriculum_semester_id),
        ]);
    }

    /**
     * Creates a new ProgCurriculumSemester model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProgCurriculumSemester();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prog_curriculum_semester_id' => $model->prog_curriculum_semester_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProgCurriculumSemester model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prog_curriculum_semester_id Prog Curriculum Semester ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prog_curriculum_semester_id)
    {
        $model = $this->findModel($prog_curriculum_semester_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prog_curriculum_semester_id' => $model->prog_curriculum_semester_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgCurriculumSemester model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prog_curriculum_semester_id Prog Curriculum Semester ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prog_curriculum_semester_id)
    {
        $this->findModel($prog_curriculum_semester_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProgCurriculumSemester model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prog_curriculum_semester_id Prog Curriculum Semester ID
     * @return ProgCurriculumSemester the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prog_curriculum_semester_id)
    {
        if (($model = ProgCurriculumSemester::findOne(['prog_curriculum_semester_id' => $prog_curriculum_semester_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
