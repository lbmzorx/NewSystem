<?php
/**
 * Created by Administrator.
 * Date: 2018/6/23 20:57
 * github: https://github.com/lbmzorx
 */
namespace common\components\tools;

use yii\base\BaseObject;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\httpclient\Client;
use yii\web\Cookie;

class ClientTransfer extends BaseObject
{
    public $sheme='http://';
    public $host;
    public $port;
    public $tranRoute;
    public $cookie_names;
    public $cookies;

    public function run($verb,$route,$data=[], $headers=[], $options=[],$cookie=null){
        if($this->port!=null){
            $host=$this->sheme.$this->host.':'.$this->port.'/';

        }else{
            $host= $this->sheme.$this->host.'/';
        }
        $url= $host.$route;

        $cookie=\yii::$app->request->cookies;

        $client=new Client();
        $request=$client->createRequest()
            ->setHeaders($headers)
            ->setMethod($verb)
            ->setUrl($url)
            ->setData($data);
        if($cookie instanceof Cookie){
            $request->setCookies($cookie);
        }
          $response= $request->send();

//        throw new Exception(VarDumper::dumpAsString($response));
//        foreach ($response->cookies as $cookie){
//            \yii::$app->response->cookies->add($cookie);
//        }
        if ($response->isOk) {
            return $this->pregUrl($response->content);
        }else{
            return $response;
        }
    }

    public function pregUrl($content){
        if(is_string($content)&&strlen($content)>1){
            $content=preg_replace('/(src=")([^"]*")/','${1}'.$this->tranRoute.'${2}',$content);
            $content=preg_replace('/(href=")([^"]*")/','${1}'.$this->tranRoute.'${2}',$content);
        }
        return $content;
    }

}