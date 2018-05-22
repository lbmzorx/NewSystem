<?php
namespace backend\modules\system\controllers;

use backend\controllers\BaseCommon;
use common\components\tools\Sign;
use yii\base\Exception;
use yii\web\Response;

/**
 * Default controller for the `system` module
 */
class CacheController extends BaseCommon
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionBackend()
    {
        return $this->render('backend');
    }

    public function actionClearCacheBackend(){
        $status=\yii::$app->cache->flush();
        \yii::$app->response->format=Response::FORMAT_JSON;
        if($status){
            return ['status'=>$status,'msg'=>\yii::t('app','Success')];
        }else{
            return ['status'=>$status,'msg'=>\yii::t('app','Clear Failed')];
        }
    }

    public function actionClearSchameBackend(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        try{
            \yii::$app->db->schema->refresh();
            return ['status'=>true,'msg'=>\yii::t('app','Success')];
        }catch (Exception $e){
            return ['status'=>false,'msg'=>$e->getMessage()];
        }
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionFrontend()
    {
        $sign=new Sign();
        $sign->generateUserSign();

        return $this->render('frontend');
    }

    public function actionClearCacheFrontent(){
        $status=\yii::$app->cache->flush();
        \yii::$app->response->format=Response::FORMAT_JSON;
        if($status){
            return ['status'=>$status,'msg'=>\yii::t('app','Success')];
        }else{
            return ['status'=>$status,'msg'=>\yii::t('app','Clear Failed')];
        }
    }

    public function actionClearSchameFrontent(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        try{
            \yii::$app->db->schema->refresh();
            return ['status'=>true,'msg'=>\yii::t('app','Success')];
        }catch (Exception $e){
            return ['status'=>false,'msg'=>$e->getMessage()];
        }
    }
}
