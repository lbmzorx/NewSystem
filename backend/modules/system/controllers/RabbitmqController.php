<?php
/**
 * Created by Administrator.
 * Date: 2018/6/21 21:42
 * github: https://github.com/lbmzorx
 */

namespace backend\modules\system\controllers;


use backend\controllers\BaseCommon;
use common\components\tools\RabbitmqManager;

class RabbitmqController extends BaseCommon
{
    public function actionIndex(){
        $route=\yii::$app->request->url;
        $rabbitmqManager=new RabbitmqManager([
            'user_id'=>\yii::$app->user->id,
        ]);

        return $rabbitmqManager->render($route);
    }
}