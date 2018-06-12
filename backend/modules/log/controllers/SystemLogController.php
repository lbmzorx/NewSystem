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
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'php']));
    }

    public function actionNginx(){
        $path=\yii::getAlias('@runtime/nginx');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'nginx']));
    }

    public function actionMysql(){
        $path=\yii::getAlias('@runtime/mysql');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'mysql']));
    }

    public function actionRedis(){
        $path=\yii::getAlias('@runtime/redis');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'redis']));
    }

    public function actionRabbitmq(){
        $path=\yii::getAlias('@runtime/rabbitmq');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'rabbitmq']));
    }

    public function actionSwoole(){
        $path=\yii::getAlias('@runtime/swoole');
        $request=\yii::$app->request;
        $filename=$request->get('filename');
        return $this->render('rows',array_merge(RuntimeHelper::getFileList($path,$filename),['filepath'=>'swoole']));
    }

    public function actionDownload(){
        $filename=\yii::$app->request->get('filename');
        $filepath=\yii::$app->request->get('filepath');
        $path=\yii::getAlias('@runtime/'.$filepath);

        $response=RuntimeHelper::loadFile($path,$filename);
        if($response!=false && is_object($response)){
            return $response;
        }else{
            return false;
        }

    }
}
