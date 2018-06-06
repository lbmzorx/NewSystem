<?php

namespace backend\modules\log\controllers;

use backend\models\Truncate;
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
        return $this->render('php');
    }

    public function actionNginx(){
        return $this->render('nginx');
    }

    public function actionMysql(){
        return $this->render('mysql');
    }

    public function actionRedis(){
        return $this->render('redis');
    }
}
