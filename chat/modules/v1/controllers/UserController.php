<?php

namespace chat\modules\v1\controllers;

use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class UserController extends Controller
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
