<?php

namespace app\modules\studentRecords\controllers;

use app\components\Photo;
use app\models\generated\search\StudentProgrammeCurriculumSearch;
use app\models\generated\Student;
use app\models\generated\search\StudentSearch;
use JetBrains\PhpStorm\ArrayShape;
use Stidges\CountryFlags\CountryFlag;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'photo-upload' => ['POST'],
                        'photo' => ['GET'],
                        'next-of-kin' => ['POST'],
                        'personal-info' => ['POST'],
                        'contact-info' => ['POST'],
                    ],
                ],
            ],
        );
    }

    /**
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param string $STUDENT_ID Student ID
     * @return Response
     */
    public function actionView($STUDENT_ID)
    {
        return $this->redirect(['details', 'STUDENT_ID' => $STUDENT_ID]);
//        return $this->render('view', [
//            'model' => $this->findModel($STUDENT_ID),
//        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'STUDENT_ID' => $model->STUDENT_ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Photo Upload endpoint for Students
     * @param $id
     * @return string[]
     */
    #[ArrayShape(['output' => "string", 'message' => "string"])]
    public function actionPhotoUpload($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $fileName = str_replace('/', '', $id);
        $file = $_FILES['stdn-avatar-input'];

        $target_dir = Yii::getAlias('@photos') . '/students/';
        @mkdir($target_dir, 0777, true);
        $target_file = $target_dir . $fileName;

        $toWidth = Yii::$app->params['image']['default']['width'];
        $toHeight = Yii::$app->params['image']['default']['height'];

        $fileName = $file['name'];
//        $tmpName  = $file['tmp_name'];
//        $fileSize = $file['size'];
//        $fileType = $file['type'];
        $image = new Photo();
        $image->load($file['tmp_name']);
//        $image->resizeToWidth($toWidth);
        $image->resizeToHeight($toHeight);

        $ext = explode('.', $fileName);
        $ext = strtolower(array_pop($ext));
        $image->unlink($target_file); // Remove any previous image
        $image->save($target_file . '.' . $ext);

        return ['output' => '', 'message' => ''];
    }

    /**
     * Get the Student's Photo
     * @param $id
     * @return int|string
     * @throws NotFoundHttpException
     */
    public function actionPhoto($id): int|string
    {
        $model = $this->findModel($id);
        return $model->avatar();
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $STUDENT_ID Student ID
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($STUDENT_ID)
    {
        if (($model = Student::findOne(['STUDENT_ID' => $STUDENT_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Displays a single Student model.
     * @param string $STUDENT_ID Student ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDetails($STUDENT_ID)
    {
        $model = $this->findModel($STUDENT_ID);

        return $this->render('details', [
            'model' => $model,
            'STUDENT_ID' => $STUDENT_ID,
        ]);
//        return $this->render('details', ['STUDENT_ID' => $STUDENT_ID]);
    }

    public function actionPersonalInfo($id,$view=false)
    {
        if (isset($_POST['hasEditable'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = Student::findOne($id);
            $name = $model->formName();
            $oMsg = '';
            $posted = ($_POST[$name]);
            $post = [$name => $posted];
            if ($model->load($post)) {
                if (isset($posted['NATIONALITY']))
                    $oMsg = (new CountryFlag)->get($model->nationality->CODE2) . ' ' . $model->nationality->NATIONALITY;
                if (isset($posted['SPONSOR']))
                    $oMsg = $model->sponsor->SPONSOR_NAME;
                if (isset($posted['SURNAME']) || isset($posted['OTHER_NAMES']))
                    $oMsg = $model->SURNAME . ' ' . $model->OTHER_NAMES;
                if ($model->save()) {
                    // return JSON encoded output in the below format on success with an empty `message`
                    return ['output' => $oMsg, 'message' => ''];
                } else {
                    // alternatively you can return a validation error (by entering an error message in `message` key)
                    return ['output' => '', 'message' => 'Error: [' . implode(', ', array_values($model->getFirstErrors())) . ']'];
                }
            }

        }
        return Json::encode($this->renderAjax('details/_profile', [
                'model' => $this->findModel($id), 'canEdit' => !$view]
        ));
    }

    public function actionNextOfKin($id)
    {
//        return Json::encode($this->renderAjax('details/next_of_kin'));
        return Json::encode($this->renderAjax('details/_nok'));
    }

    public function actionFeesStatement($id)
    {
        return Json::encode($this->renderAjax('details/_fee'));
    }

    public function actionContactInfo($id)
    {
        return Json::encode($this->renderAjax('details/_contact'));
    }

    public function actionProgramme($id)
    {
        $searchModel = new StudentProgrammeCurriculumSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['STUDENT_ID' => $id]);
        $dataProvider->pagination = false;
        $dataProvider->sort = false;
        return Json::encode($this->renderPartial('details/_programme', [
            'dataProvider' => $dataProvider,
        ]));
    }
}
