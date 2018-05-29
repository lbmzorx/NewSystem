<?php
namespace backend\modules\system\controllers;

use backend\controllers\BaseCommon;
use common\components\helper\SignHelper;
use common\models\startdata\Options;
use yii\base\Exception;
use yii\helpers\Url;
use yii\httpclient\Client;
use yii\httpclient\debug\HttpClientPanel;
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
        return $this->render('frontend');
    }

    public function actionClearCacheFrontend(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        $frontendHost=Options::findOne([
            'name'=>'website_url',
            'type'=>Options::TYPE_SYSTEM,
        ]);
        if(! $frontendHost->value){
            return ['status'=>false,'msg'=>\yii::t('app','Please Set the Frontend Website Url!')];
        }
        $sign=SignHelper::signSecretOpenKey([],\yii::$app->user->identity->secret_key,\yii::$app->user->identity->getAuthKey(),true,true);
        $client = new Client([
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],
        ]);
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($frontendHost->value.'system/clear-cache')
            ->setData($sign)
            ->send();
        if ($response->isOk) {
            $data = $response->data;
            if(isset($data['status'])&& $data['status']==true){
                return ['status'=>true,'msg'=>\yii::t('app','Success'),'data'=>$data];
            }else{
                return ['status'=>false,'msg'=>isset($data['msg'])?$data['msg']:\yii::t('app','Error'),];
            }
        }else{
            return ['status'=>false,'msg'=>\yii::t('app','Clear Failed'),];
        }
    }

    public function actionClearSchameFrontend(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        $frontendHost=Options::findOne([
            'name'=>'website_url',
            'type'=>Options::TYPE_SYSTEM,
        ]);
        if(! $frontendHost->value){
            return ['status'=>false,'msg'=>\yii::t('app','Please Set the Frontend Website Url!')];
        }
        $sign=SignHelper::signSecretOpenKey([],\yii::$app->user->identity->secret_key,\yii::$app->user->identity->getAuthKey(),true,true);
        $client = new Client([
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],
        ]);
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($frontendHost->value.'system/clearschame-cache')
            ->setData($sign)
            ->send();
        if ($response->isOk) {
            $data = $response->data;
            if(isset($data['status'])&& $data['status']==true){
                return ['status'=>true,'msg'=>\yii::t('app','Success'),'data'=>$data];
            }else{
                return ['status'=>false,'msg'=>isset($data['msg'])?$data['msg']:\yii::t('app','Error'),'data'=>$data];
            }
        }else{
            return ['status'=>false,'msg'=>\yii::t('app','Clear Failed'),'data'=>$response->getContent()];
        }
    }
}
