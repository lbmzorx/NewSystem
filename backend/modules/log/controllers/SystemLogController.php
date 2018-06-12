<?php

namespace backend\modules\log\controllers;

use backend\models\Truncate;
use common\components\helper\RuntimeHelper;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\YiiLog;
use common\models\adminsearch\YiiLog as SearchModel;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * YiiLogController implements the CRUD actions for common\models\admindata\YiiLog model.
 */
class SystemLogController extends BaseCommon
{

    public function actionPhp(){
        $path=\yii::getAlias('@runtime/php');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',RuntimeHelper::getFileList($path,$filename));
    }

    public function actionNginx(){
        $path=\yii::getAlias('@runtime/nginx');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',RuntimeHelper::getFileList($path,$filename));
    }

    public function actionMysql(){
        $path=\yii::getAlias('@runtime/mysql');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',RuntimeHelper::getFileList($path,$filename));
    }

    public function actionRedis(){
        $path=\yii::getAlias('@runtime/redis');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',RuntimeHelper::getFileList($path,$filename));
    }
}
