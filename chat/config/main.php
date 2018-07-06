<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-chat',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'chat\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'apidoc' => [
            'class' => 'daodao97\apidoc\Module',
        ],
        'v1' => [
            'class' => 'chat\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            // \yii\web\Request
            'csrfParam' => '_csrf-chat',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'enableSession'=>false,
            'loginUrl'=>null,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [//\yii\web\UrlManager
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'POST login'=>'site/login'
            ],
        ],
        'response'=>[
            'format'=>\yii\web\Response::FORMAT_JSON,
        ],
    ],
    'params' => $params,
];
