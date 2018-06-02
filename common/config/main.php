<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' =>1,
        ],
        'i18n' => [
            'translations' => [//多语言包设置
                'model' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@common/messages',
//                    'sourceLanguage' => 'zh-CN',
                ],
                'statuscode'=>[
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@common/messages',
                ],
                'amodel'=>[
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@common/messages',
                ],
                'astatuscode'=>[
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::className(),
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'db'=>'dbadmin',
                    'levels' => ['error', 'warning'],
                    'logTable'=>'{{%yii_log}}',
                ],
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
        ],
    ],
    'timeZone' => 'Asia/Shanghai',
    'language'=>'zh-CN',
];
