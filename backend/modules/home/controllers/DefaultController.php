<?php

namespace backend\modules\home\controllers;

use backend\controllers\BaseCommon;
use yii\web\Controller;

/**
 * Default controller for the `home` module
 */
class DefaultController extends BaseCommon
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
