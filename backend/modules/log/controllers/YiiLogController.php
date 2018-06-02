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
class YiiLogController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameDelete      =YiiLog::className();
        $this->modelNameView        =YiiLog::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

    public function actionTruncate(){
        if(!\yii::$app->request->isPost){
            throw new BadRequestHttpException(\yii::t('app','Request Error Type!'));
        }
        \yii::$app->response->format=Response::FORMAT_JSON;
        $truncate = new Truncate();
        $truncate->load(['db'=>'dbadmin','table'=>YiiLog::tableName()],'');
        if($truncate->validators && $truncate->trancate()){
            $return= ['status'=>true,'msg'=>\yii::t('app','Success')];
        }else{
            $return= ['status'=>false,'msg'=>ModelHelper::getErrorAsString($truncate,$truncate->getErrors())];
        }
        if(\yii::$app->request->isAjax){
            return $return;
        }else{
            \yii::$app->session->addFlash($return?'success':'error',$return['msg']);
            return $this->redirect('index');
        }


    }

}
