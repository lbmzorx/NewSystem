<?php

namespace backend\modules\home\controllers;

use backend\controllers\BaseCommon;
use common\components\tools\System;
use common\models\admindata\YiiLog;
use yii\web\Controller;
use yii\web\Response;

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
        $request=\yii::$app->request;
        if($request->isAjax ){
            \yii::$app->response->format=Response::FORMAT_JSON;
            $data=System::getAll();
            return $data;
        }
        $yiilogCount=YiiLog::find()->where(['>=','log_time',strtotime(date("Y-m-d"))])->count();
        return $this->render('index',['yiilogCount'=>$yiilogCount]);
    }
}
