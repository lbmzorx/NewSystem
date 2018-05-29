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

    public static function Sign($data,$isUrlCode=true){
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
     * @param $data
     * @param $secretKey
     * @param bool $isUrlCode
     * @param bool $isArray
     * @return array|bool|string
     */
    public static function signSecretKey($data,$secretKey,$isUrlCode=true,$isArray=false){
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

            $sign=md5($str.'secret_key='.$secretKey);
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

    public static function signSecretOpenKey($data,$secretKey,$openKey,$isUrlCode=true,$isArray=false){
        $str='';
        if($secretKey){
            $data=array_merge(['date'=>date('Y-m-d H:i:s')],$data);
            if($openKey){
                $data=array_merge(['access_key'=>$openKey],$data);
            }
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

            $sign=md5($str.'secret_key='.$secretKey);
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

    public static function checkSignSecretKey($data,$secretKey,$isUrlCode=true){
        $str='';
        if(empty($data['sign'])){
            return false;
        }
        if($secretKey){
            $sign=$data['sign'];
            unset($data['sign']);
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
            return $sign==md5($str.'secret_key='.$secretKey);
        }
        return false;
    }

}
