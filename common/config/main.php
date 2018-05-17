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
            ],
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::className(),
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'logTable'=>'{{%yii_log}}',
                ]
            ],
        ],
    ],
    'timeZone' => 'Asia/Shanghai',
//    'language'=>'zh-CN',
];
