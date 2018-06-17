<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'redisqueue','rabbitqueue' // The component registers its own console commands
    ],
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
                [
                    'class'=>'common\components\log\QueueTarget',
                    'categories'=>[
                        'yii\web\HttpException:404',
                    ],
                    'queue'=>'rabbitqueue',
                    'job'=>'common\components\job\IpLimitJob',
                    'rules'=>[
                        '(pma|PMA|dbadmin|wls-wsat|db|phpmyadmin|ccvv).*'
                    ],
                ],
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
        ],
        'redisqueuedb' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' =>5,
        ],
        'redisqueue' => [
            'class' => \yii\queue\redis\Queue::class,
            'redis' => 'redisqueuedb', // Redis connection component or its config
            'channel' => 'mq:', // Queue channel key
        ],
        'rabbitqueue' => [
            'class' => \yii\queue\amqp\Queue::class,
            'host' => '127.0.0.1',
            'port' => 5672,
            'user' => 'guest',
            'password' => 'guest',
            'queueName' => 'queue',
        ],

    ],
    'timeZone' => 'Asia/Shanghai',
    'language'=>'zh-CN',
];
