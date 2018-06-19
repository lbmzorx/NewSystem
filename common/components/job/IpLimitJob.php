<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 11:07
 * github: https://github.com/lbmzorx
 */
namespace common\components\job;
use common\components\security\TencenApi;
use common\models\admindata\AttackIp;
use yii\base\InvalidParamException;
use yii\base\Model;

class IpLimitJob extends Model implements \yii\queue\JobInterface
{

    public $ip; 	// 发送者ID

    public $msg;

    public function execute($queue){
        if(! AttackIp::find()->where(['ip'=>$this->ip])->exists()){
            $attackip=new AttackIp();
            $attackip->ip=$this->ip;
            $attackip->save();
            try{
                $tencent=new TencenApi();

                $tencent->send($this->ip,$this->msg);
            }catch (InvalidParamException $e){

            }

        }
    }
}