<?php

/**
 * @class BaseController
 *
 * contains logic common to all controllers
 */

namespace app\controllers;

use app\modules\setup\controllers\DefaultController;
use yii\helpers\Url;

use Yii;
use yii\web\View;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

class BaseController extends Controller
{
    /**
     * initialize Controller
     *
     * @return void
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Yii::$app->view->on(View::EVENT_BEGIN_BODY, function () {
                $this->fillBreadcrumbs();
            });

            return true;
        } else {
            return false;
        }
    }

    /**
     * Fill common breadcrumbs
     */
    protected function fillBreadcrumbs()
    {
        $breadcrumbs = [];

        //Add needed elements to $breadcrumbs below

        $array = explode("/", Yii::$app->request->pathInfo);

        array_pop($array);

        $module = $array[0];


        $label = ucwords($module);
        $breadcrumbs[] = $this->route == '/tests/default/index' ? $label : [
            'label' => $label,
            'url' => Url::to([DefaultController::class, 'index']),
        ];



        $this->mergeBreadCrumbs($breadcrumbs);
    }

    /**
     * Prepend common breadcrumbs to existing ones
     * @param array $breadcrumbs
     */
    protected function mergeBreadcrumbs($breadcrumbs)
    {
        $existingBreadcrumbs = ArrayHelper::getValue($this->view->params, 'breadcrumbs', []);
        $this->view->params['breadcrumbs'] = array_merge($breadcrumbs, $existingBreadcrumbs);
    }
}
