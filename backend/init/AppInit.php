<?php
namespace backend\init;
/**
 * Created by Administrator.
 * Date: 2018/5/18 23:17
 * github: https://github.com/lbmzorx
 */

use common\components\event\AdminLog;
use Yii;
use yii\base\Event;
use yii\db\BaseActiveRecord;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\JqueryAsset;

class AppInit extends \yii\base\Component
{
    public static function sets($event){
        static::setAppParams();
    }

    public static function setAppParams(){
        static::logDatabase();
        static::setLayoutKlorofil();
    }

    public static function logDatabase(){
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_INSERT, [
            AdminLog::className(),
            'create'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_UPDATE, [
            AdminLog::className(),
            'update'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_DELETE, [
            AdminLog::className(),
            'delete'
        ]);
    }

    public static function setLayoutKlorofil()
    {
        \yii::$app->params['layout'] = '/main-klorofil';
        \yii::$app->params['login_layout'] = '/login-klorofil';
        \yii::$app->params['guest_layout'] = '/layouts/guest-klorofil';
        \Yii::Configure(\yii::$app->assetManager, [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@resource/tid_5_klorofil/assets/vendor/jquery',
                    'js' => [
                        'jquery.min.js',
                    ],
                    'jsOptions' => [
                        'position' => \yii\web\View::POS_HEAD,
                    ],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@resource/tid_5_klorofil/assets/vendor/bootstrap',
                    'css' => [
                        'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => '@resource/tid_5_klorofil/assets/vendor/bootstrap',
                    'js' => [
                        'js/bootstrap.min.js',
                    ],
                ],
            ],
        ]);
        \Yii::Configure(\yii::$app->errorHandler, [
            'errorAction' => 'site/error',
        ]);
    }

}