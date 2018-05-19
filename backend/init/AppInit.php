<?php
namespace backend\init;
/**
 * Created by Administrator.
 * Date: 2018/5/18 23:17
 * github: https://github.com/lbmzorx
 */
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;

class AppInit extends \yii\base\Component
{
    public static function sets($event){
        static::setAppParams();
    }


    public static function setAppParams(){
        static::setLayoutKlorofil();
    }

    public static function setLayoutKlorofil(){
        \yii::$app->params['layout']='main-klorofil';
        \yii::$app->params['login_layout']='login-klorofil';
        \Yii::Configure(\yii::$app->assetManager, [
            'bundles'=>[
                'yii\bootstrap\BootstrapAsset'=>[
                    'sourcePath'=>'@resource/tid_5_klorofil/assets/vendor/bootstrap',
                    'css' => [
                        'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset'=>[
                    'sourcePath'=>'@resource/tid_5_klorofil/assets/vendor/bootstrap',
                    'js' => [
                        'js/bootstrap.min.js',
                    ],
                ],
            ],
        ]);
    }

}