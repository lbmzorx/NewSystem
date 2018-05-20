<?php
/**
 * Created by Administrator.
 * Date: 2018/5/20 20:03
 * github: https://github.com/lbmzorx
 */

namespace backend\controllers;


use common\models\admindata\Log;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class TestController extends Controller
{
    public function actionList(){
        $request=\yii::$app->request;

        \yii::$app->response->format=Response::FORMAT_JSON;

        /**
         * @var $redis \yii\redis\Connection
         */
        $redis=\yii::$app->redis;
        $t_sn=$request->get('t_sn');
        $data=$redis->get($t_sn);
        if( $data ){
            $redis->watch($t_sn);
            $redis->multi();
            $redis->del($t_sn);
            $status=($redis->exec())?true:false;
        }else{
            $status= false;
        }
        return ['status'=>$status,'data'=>$data];
    }

    public function actionAdd(){
        $request=\yii::$app->request;

        \yii::$app->response->format=Response::FORMAT_JSON;
        /**
         * @var $redis \yii\redis\Connection
         */
        $redis=\yii::$app->redis;

        if($data=$redis->get('t_sn')){
            $status=false;
        }else{
            $data=Log::find()->where(['>=','id',1])->asArray()->one();
            $redis->set('t_sn',Json::encode($data),'nx');
            $status=true;
        }

        return ['status'=>$status,'data'=>$data];

    }


}