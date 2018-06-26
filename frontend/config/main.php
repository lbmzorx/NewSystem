<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'=>'article/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',

        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [//邮箱发件人配置，会被main-local.php以及后台管理页面中的smtp配置覆盖
            'class' => yii\swiftmailer\Mailer::className(),
            'viewPath' => '@frontend/mail',
            'useFileTransport' => false,//false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
                'username' => 'lbmzorx@163.com',
                'password' => 'H2ja92iz820mo2ul',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['admin@feehi.com' => 'Feehi CMS robot ']
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'article/view/<id:\d+>'=>'article/view',
            ],
        ],
        'i18n' => [
            'translations' => [//多语言包设置
                'app*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@frontend/message',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
                'error' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@frontend/message',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'error' => 'error.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@resource/vendor/jquery/', // 屏蔽jqueryAsset
                    'js' => [
                        'jquery.min.js'
                    ],
                    'jsOptions'=>[
                        'position' => \yii\web\View::POS_HEAD,
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@resource/vendor/bootstrap/', // 屏蔽jqueryAsset
                    'css' => [
                        'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => '@resource/vendor/bootstrap/', // 屏蔽jqueryAsset
                    'js' => [
                        'js/bootstrap.min.js',
                    ],
                ],
                'yii\bootstrap\BootstrapThemeAsset' => [
                    'sourcePath' => '@resource/vendor/bootstrap/', // 屏蔽jqueryAsset
                    'css' => [
                        'css/bootstrap-theme.min.css',
                    ],
                ],
            ],
        ],
    ],
    'on beforeRequest'=>['frontend\init\AppInit','sets'],
    'params' => $params,
];
