<?php
/**
 * Created by Administrator.
 * Date: 2018/6/2 20:37
 * github: https://github.com/lbmzorx
 */

namespace common\components\helper;


use yii\db\Exception;

class SerialNumberHelper
{
    public static function intIncreRedisNumber($key,$ttl=null){
        try{
            /**
             * @var $redis \yii\redis\Connection
             */
            $redis=\yii::$app->redis;
            $lua=<<<LUA


    if( redis.call("EXISTS",KEYS[1])) then
        
        return redis.call("INCR",KEYS[1])
    else 
        return redis.call("SET",KEYS[1],1,'NX')
    end
LUA;
            $redis->eval($lua,1,$key,$ttl);
        }catch(Exception $e){

        }


    }
}