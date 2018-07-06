<?php

namespace chat\modules\v1\controllers;

use chat\models\v1\user\LoginForm;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class SiteController extends Controller
{
    const status_codes=[
        '400040'=>'Can\'t generate public key',
    ];


    /**
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[

        ]); // TODO: Change the autogenerated stub
    }

    /**
     * @return array
     */
    public function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'date' =>['GET'],
            'public-key' => ['GET'],
            'login' => ['POST'],
            'register' => ['POST'],
        ];
    }

    /**
     *
     */
    public function actionIndex(){
        return [
            'Hello world!'
        ];
    }

    /**
     * @SWG\Get(path="/date",
     *     tags={"date"},
     *     summary="显示系统时间",
     *     description="返回系统时间",
     *     produces={"application/json"},
     *
     *     @SWG\Response(
     *         response = 200,
     *         description = "success"
     *     )
     * *   @SWG\Response(
     *     response="datetime",
     *     description="A list with products"
     *   ),

     * )
     *
     */
    public function actionDate(){
        return [
            'datetime'=>date('Y-m-d H:i:s')
        ];
    }

    public function actionLogin(){
        $model=new LoginForm();
        $model->load(\yii::$app->request->post(),'');
        $res=$model->login();
        if ($res){
            return ['access_token'=>$res];
        }else{
            return $model;
        }
    }

    public function actionPublicKey(){
        $publicKey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true);
        if ($publicKey) {
            return ['public-key'=>$publicKey];
        }
        return [
            'status_code'=>'400001',
            'msg'=>'',
        ];
    }

    public  function actionEncrypt(){

    }

    public function actionError(){
        $exception=\yii::$app->errorHandler->exception;
        if($exception){
            return [
                'code'=>$exception->getCode(),
                'message'=>$exception->getMessage(),
            ];
        }
    }
}
