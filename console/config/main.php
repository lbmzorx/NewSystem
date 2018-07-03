<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'swoole-frontend' => [
            'class' => feehi\console\SwooleController::className(),
            'rootDir' => str_replace('console/config', '', __DIR__ ),//yii2项目根路径
            'type' => 'advanced',//yii2项目类型，默认为advanced。此处还可以为basic
            'app' => 'frontend',//app目录地址,如果type为basic，这里一般为空
            'host' => '127.0.0.1',//监听地址
            'port' => 9520,//监听端口
            'web' => 'web',//默认为web。rootDir app web目的是拼接yii2的根目录，如果你的应用为basic，那么app为空即可。
            'debug' => false,//默认开启debug，上线应置为false
            'env' => 'prod',//默认为dev，上线应置为prod
            'swooleConfig' => [//标准的swoole配置项都可以再此加入
                'reactor_num' => 1,
                'worker_num' => 2,
                'daemonize' => true,
                'log_file' =>__DIR__ . '/../../frontend/runtime/swoole/swoole.log',
                'log_level' => 4,   //4 warning
                'pid_file' => __DIR__ . '/../../frontend/runtime/swoole/swoole.pid',
                'user'=>'www',
                'group'=>'www',
                'max_request'=>100,     //防止内存溢出，如果应用比较消耗内存，则应减小
            ],
        ],
        'swoole-backend' => [
            'class' => feehi\console\SwooleController::className(),
            'rootDir' => str_replace('console/config', '', __DIR__ ),//yii2项目根路径
            'app' => 'backend',
            'host' => '127.0.0.1',
            'port' => 9530,
            'web' => 'web',//默认为web。rootDir app web目的是拼接yii2的根目录，如果你的应用为basic，那么app为空即可。
            'debug' => false,//默认开启debug，上线应置为false
            'env' => 'prod',//默认为dev，上线应置为prod
            'swooleConfig' => [
                'reactor_num' => 1,
                'worker_num' => 2,
                'daemonize' => true,
                'log_file' => __DIR__ . '/../../backend/runtime/swoole/swoole.log',
                'log_level' => 4,   //4 warning
                'pid_file' => __DIR__ . '/../../backend/runtime/swoole/swoole.pid',
                'user'=>'www',
                'group'=>'www',
                'max_request'=>100,     //防止内存溢出，如果应用比较消耗内存，则应减小,
            ],
        ],
        'swoole-queue-frontend' =>[
            'class'=>'console\controllers\UserMessageController',
        ],
        'swoole-websocket'=>[
            'class'=>'console\controllers\SwooleWebsocketController',
            'rootDir' => str_replace('console/config', '', __DIR__ ),//yii2项目根路径
            'app' => 'chat',
            'host' => '192.168.110.11',
            'port' => 9540,
            'web' => 'web',//默认为web。rootDir app web目的是拼接yii2的根目录，如果你的应用为basic，那么app为空即可。
            'debug' => false,//默认开启debug，上线应置为false
            'env' => 'prod',//默认为dev，上线应置为prod
            'swooleConfig' => [
                'reactor_num' => 1,
                'worker_num' => 2,
                'daemonize' => false,
                'log_file' => __DIR__ . '/../../console/runtime/swoole/swoole.websocket.log',
                'log_level' => 4,   //4 warning
                'pid_file' => __DIR__ . '/../../console/runtime/swoole/swoole.websocket.pid',
                'user'=>'www',
                'group'=>'www',
                'max_request'=>100,     //防止内存溢出，如果应用比较消耗内存，则应减小,
            ],
        ]
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
