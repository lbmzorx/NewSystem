<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 11:07
 * github: https://github.com/lbmzorx
 */
namespace common\components\job;
use common\components\security\TencenApi;
use common\models\admindata\AttackIp;
use common\models\startdata\UserMessage;
use yii\base\Model;

class IpLimitJob extends Model implements \yii\queue\JobInterface
{

    public $ip; 	// 发送者ID

    public $msg;

    public function execute($queue){
        var_dump('haha');
        if(! AttackIp::find()->where(['ip'=>$this->ip])->exists()){
//            $attackip=new AttackIp();
//            $attackip->ip=$this->ip;
//            $attackip->save();
            $tencent=new TencenApi();

            $tencent->send($this->ip,$this->msg);
        }
    }
}