<?php

namespace app\modules\setup\controllers;

use app\components\Basic;
use app\models\generated\OrgUnit;
use app\models\generated\OrgUnitHistory;
use app\models\generated\search\OrgUnitSearch;
use Yii;
use yii\base\UserException;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * OrgUnitController implements the CRUD actions for OrgUnit model.
 */
class OrgUnitController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrgUnit models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrgUnitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrgUnit model.
     * @param $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrgUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new OrgUnitHistory();

        if ($this->request->isPost) {
            $this->processHistory($model,$this->request->post());
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrgUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->session->setFlash('settings-error', [
            'type' => 'success',
            'message' => '-----',
            'title' => 'Unsuccessful',
        ]);

        $model = $this->findModel($id);

        if ($this->request->isPost) {
            $this->processHistory($model,$this->request->post(),true);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function processHistory(OrgUnitHistory $model,$post,$update=false){
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model->load($post);

            $uModel = new OrgUnit();
            $uModel->UNIT_CODE = $model->UNITCODE;
            $uModel->UNIT_NAME = $model->UNITNAME;
            // Create Org Unit
            if($update) {
                $changed = $model->getDirtyAttributes();
                // Check if there is a changed attribute
                foreach ($changed as $attr=>$val){
                    if(Basic::notEmpty($val,$model->getOldAttribute($attr))){
                        unset($changed[$attr]);
                    }
                }
                if(!count($changed)){
                    throw new UserException('No changes were detected!');
                }
            }
exit('...'.$model->getOldAttribute('someAttribute').'<<<<<');
            if (!$uModel->save()) {
                $msgE = Basic::modelError($uModel,'li');
                throw new UserException("An error occurred.<br/><ol>$msgE</ol>",500);
            }
            // Get Org Unit ID and Add the History Details
            $model->ORG_UNIT_ID = $uModel->UNIT_ID;

            if (!$model->save()) {
                $msgE = Basic::modelError($model,'li');
                throw new UserException("An error occurred.<br/><ol>$msgE</ol>",500);
            }
            $transaction->commit();
            return $this->redirect(['view', 'id' => $model->ORG_UNIT_ID]);
        }
        catch (UserException $e){
            $transaction->rollBack();
            Yii::$app->getSession()->setFlash('settings-error', [
                'type' => 'danger',
                'message' => $e->getMessage(),
                'title' => 'Unsuccessful',
            ]);
            return $this->redirect(['view', 'id' => $model->ORG_UNIT_ID]);
        }
    }

    /**
     * Finds the OrgUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param $id
     * @return array|OrgUnitHistory|ActiveRecord|null the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = OrgUnitHistory::find()
            ->where(['ORG_UNIT_ID' => $id])
            ->orderBy(['ORG_UNIT_HISTORY_ID'=>'DESC'])
        ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
