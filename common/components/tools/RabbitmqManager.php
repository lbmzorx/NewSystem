<?php
/**
 * Created by Administrator.
 * Date: 2018/6/21 21:43
 * github: https://github.com/lbmzorx
 */

namespace common\components\tools;


use yii\base\BaseObject;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\web\Cookie;

class RabbitmqManager extends BaseObject
{
    public $user_id;
    public $host='127.0.0.1';
    public $port='15672';
    public $tranRoute;

    public function render($route){

        $client=new ClientTransfer([
            'host'=>$this->host,
            'port'=>$this->port,
            'tranRoute'=>$this->tranRoute,
        ]);

        if(\yii::$app->request->method=='GET'){
            $data=\yii::$app->request->getQueryParams();
        }else{
            $data=\yii::$app->request->getBodyParams();
        }

        $header=[];
        $cookie=null;
        if(!preg_match('/\.(css|js|png|jpg)/',$route)){
            if(!empty($_COOKIE['m'])){
                $cookie=new Cookie([
                    'name'=>'m',
                    'value'=>'Z3Vlc3Q6Z3Vlc3Q=',
                ]);
                $header=[
                    'Accept'=>'*/*',
                    'Accept-Encoding'=>'gzip, deflate, br',
                    'Accept-Language'=>'zh-CN,zh;q=0.9',
                    'authorization'=>'Basic Z3Vlc3Q6Z3Vlc3Q=',
                    'Cache-Control'=>'no-cache',
                    'Connection'=>'keep-alive',
                    'content-type'=>'application/json',
                    'Host'=>'localhost:15672',
                    'Pragma'=>'no-cache',
                    'Referer'=>'http://localhost:15672/',
                    'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
                ];
            }
        }

//Z3Vlc3Q6Z3Vlc3Q=

//        throw new Exception(VarDumper::dumpAsString($header));
        return $client->run(strtoupper(\yii::$app->request->method),$route,$data,$header,[],$cookie);
    }

    public function route(){

    }

}