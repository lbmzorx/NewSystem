<?php
/**
 * Created by Administrator.
 * Date: 2018/5/21 21:13
 * github: https://github.com/lbmzorx
 */

namespace common\components\helper;


use common\models\user\User;
use yii\base\Component;
class SignHelper extends Component
{

    public static function generateSign($data,$isUrlCode=true){
        $str='';
        $data=array_merge(['date'=>date('Y-m-d H:i:s')],$data);
        ksort($data);
        if($isUrlCode==true){
            foreach ($data as $k=>$v){
                $str.=$k.'='.urlencode($v).'&';
            }
        }else{
            foreach ($data as $k=>$v){
                $str.=$k.'='.$v.'&';
            }
        }
        $sign=md5($str);
        $str=$str.'sign='.$sign;
        return $str;
    }

    /**
     * @param $userId
     * @return bool|string
     */
    public static function generateUserSign($userId){
        if($userId && $user=User::findOne($userId)){
            return $user->getAuthKey();
        }
        return false;
    }

    /**
     * @param $data
     * @param $auth
     * @param bool $isUrlCode
     * @param bool $isArray
     * @return array|bool|string
     */
    public static function hiddenSignUrl($data,$auth,$isUrlCode=true,$isArray=false){
        $str='';
        if($auth){
            $data=array_merge(['date'=>date('Y-m-d H:i:s')],$data);
            ksort($data);
            if($isUrlCode==true){
                foreach ($data as $k=>$v){
                    $str.=$k.'='.urlencode($v).'&';
                }
            }else{
                foreach ($data as $k=>$v){
                    $str.=$k.'='.$v.'&';
                }
            }

            $sign=md5($str.'authKey='.$auth);
            $str=$str.'sign='.$sign;
            $data['sign']=$sign;
            if($isArray){
                return $data;
            }else{
                return $str;
            }
        }
        return false;
    }

    public static function signAll($data,$secretKey,$openKey,$isUrlCode=true,$isArray=false){
        $str='';
        if($secretKey){
            $data=array_merge(['date'=>date('Y-m-d H:i:s')],$data);
            ksort($data);
            if($isUrlCode==true){
                foreach ($data as $k=>$v){
                    $str.=$k.'='.urlencode($v).'&';
                }
            }else{
                foreach ($data as $k=>$v){
                    $str.=$k.'='.$v.'&';
                }
            }

            $sign=md5($str.'authKey='.$secretKey);
            $str=$str.'sign='.$sign;
            $data['sign']=$sign;
            if($isArray){
                return $data;
            }else{
                return $str;
            }
        }
        return false;
    }

}