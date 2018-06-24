<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'home' => [
            'class' => 'backend\modules\home\Module',
        ],
        'admin' => [
            'class' => 'backend\modules\admin\Module',
        ],
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],
        'article' => [
            'class' => 'backend\modules\article\Module',
        ],
        'system' => [
            'class' => 'backend\modules\system\Module',
        ],
        'setting' => [
            'class' => 'backend\modules\setting\Module',
        ],
        'log' => [
            'class' => 'backend\modules\log\Module',
        ],
        'auth' => [
            'class' => 'backend\modules\auth\Module',
        ],
        'maintain' => [
            'class' => 'backend\modules\maintain\Module',
        ],
        'temp' => [
            'class' => 'backend\modules\temp\Module',
        ],
        'tempadmin' => [
            'class' => 'backend\modules\tempadmin\Module',
        ],
    ],
    'defaultRoute'=>'home',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\admin\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'i18n' => [
            'translations' => [//多语言包设置
                'app*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/message',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'error' => 'error.php',
                    ],
                ],
                'menu'=>[
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/message',
                ]
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'adminupload/<path:[\w\d]+(/[\w\d]+)*>.<extension:(png|jpg|jpeg)>'=>'upload/admin-upload',
                'upload/<index:[\w\d]+(/[\w\d]+)*\.(png|jpg|jpeg)>'=>'upload/index',
                'system/rabbitmq/index/<innerRoute:.*>'=>'system/rabbitmq/index',
                'system/rabbitmq/<innerRoute:(js|api|img).*>'=>'system/rabbitmq/index',
            ],
        ],
    ],
    'on beforeRequest'=>['backend\init\AppInit','sets'],
    'params' => $params,
    'language'=>'zh-CN',
];
