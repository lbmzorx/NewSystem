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
        $request=\yii::$app->request;
        $innerRoute=$request->get('innerRoute');
        $rabbitmqManager=new RabbitmqManager([
            'user_id'=>\yii::$app->user->id,
            'tranRoute'=>'/'.$this->action->uniqueId.'/',
        ]);
        return $rabbitmqManager->render($innerRoute);
    }
}