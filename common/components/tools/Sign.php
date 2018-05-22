<?php
/**
 * Created by Administrator.
 * Date: 2018/5/21 21:13
 * github: https://github.com/lbmzorx
 */

namespace common\components\tools;


use yii\base\Component;
class Sign extends Component
{

    public function generateSign($data,$isUrlCode=true){
        $str='';
        $data=array_merge($data,['date'=>date('Y-m-d H:i:s')]);
        if($isUrlCode==true){
            ksort($data);
            foreach ($data as $k=>$v){
                $str.=$k.'='.urlencode($v).'&';
            }
            $sign=md5($str);
            $str=$str.'sign='.$sign;
        }
        return $str;
    }

    public function generateUserSign(){
        $auth_key=\yii::$app->user->identity->getAuthKey();
        return $auth_key;
    }
}