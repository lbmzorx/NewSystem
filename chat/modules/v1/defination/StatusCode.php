<?php
/**
 * Created by Administrator.
 * Date: 2018/7/7 21:50
 * github: https://github.com/lbmzorx
 */
namespace chat\models\v1\defination;

class StatusCode
{

    const SUCCESS=200;

    const SITE_PULIC_KEY_FAILED=400404;

    public static $category='app';

    public static $status_message=[
        self::SUCCESS=>'Success',

        self::SITE_PULIC_KEY_FAILED=>'无法创建公钥',
    ];

    public static function getMessage($code){
        if(isset(self::$status_message[$code])){
            return \yii::t(static::$category,self::$status_message[$code]);
        }
        return '';
    }
}





