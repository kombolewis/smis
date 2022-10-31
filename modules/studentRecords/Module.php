<?php

namespace app\modules\studentRecords;

use Yii;

/**
 * studentRecords module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\studentRecords\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->setLayoutPath(Yii::$app->layoutPath);
        $this->layout = 'main-contained';
    }
}
