<?php
/**
 * Created by Administrator.
 * Date: 2018/6/26 23:40
 * github: https://github.com/lbmzorx
 */
namespace console\controllers;


use console\swoole\WebsocketServer;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

class SwooleWebsocketController extends Controller
{
    public $host = "0.0.0.0";

    public $port = 9999;

    public $mode = SWOOLE_PROCESS;

    public $socketType = SWOOLE_TCP;

    public $rootDir = "";

    public $type = "advanced";

    public $app = "frontend";//如果type为basic,这里默认为空

    public $web = "web";

    public $debug = false;//是否开启debug

    public $env = 'prod';//环境，dev或者prod...

    public $swooleConfig = [];


    public function actionStart()
    {
        if( $this->getPid() !== false ){
            $this->stderr("server already  started");
            exit(1);
        }

        $pidDir = dirname($this->swooleConfig['pid_file']);
        if( !file_exists($pidDir) ) FileHelper::createDirectory($pidDir);

        $logDir = dirname($this->swooleConfig['log_file']);
        if( !file_exists($logDir) ) FileHelper::createDirectory($logDir);

        $rootDir = $this->rootDir;//yii2项目根目录
        $web = $rootDir . $this->app . DIRECTORY_SEPARATOR . $this->web;;

        defined('YII_DEBUG') or define('YII_DEBUG', $this->debug);
        defined('YII_ENV') or define('YII_ENV', $this->env);

        require($rootDir . '/vendor/autoload.php');
        //require($rootDir . '/vendor/yiisoft/yii2/Yii.php');
        if( $this->type == 'basic' ){
            $config = require($rootDir . '/config/web.php');
        }else {
            require($rootDir . '/common/config/bootstrap.php');
            require($rootDir . $this->app . '/config/bootstrap.php');

            $config = ArrayHelper::merge(
                require($rootDir . '/common/config/main.php'),
                require($rootDir . '/common/config/main-local.php'),
                require($rootDir . $this->app . '/config/main.php'),
                require($rootDir . $this->app . '/config/main-local.php')
            );
        }

        $this->swooleConfig = array_merge([
            'document_root' => $web,
        ], $this->swooleConfig);

        $server = new WebsocketServer($this->host, $this->port, $this->swooleConfig);

        /**
         * @param \swoole_http_request $request
         * @param \swoole_http_response $response
         */
//        $server->runApp = function ($request, $response) use ($config, $web) {
//            $yiiBeginAt = microtime(true);
//            $aliases = [
//                '@web' => '',
//                '@webroot' => $web,
//            ];
//            $config['aliases'] = isset($config['aliases']) ? array_merge($aliases, $config['aliases']) : $aliases;
//
//            $requestComponent = [
//                'class' => Request::className(),
//                'swooleRequest' => $request,
//            ];
//            $config['components']['request'] = isset($config['components']['request']) ? array_merge($config['components']['request'], $requestComponent) : $requestComponent;
//
//            $responseComponent = [
//                'class' => Response::className(),
//                'swooleResponse' => $response,
//            ];
//            $config['components']['response'] = isset($config['components']['response']) ? array_merge($config['components']['response'], $responseComponent) : $responseComponent;
//
//            $config['components']['session'] = isset($config['components']['session']) ? array_merge(['savePath'=>$web . '/../runtime/session'], $config['components']['session'],  ["class" => Session::className()]) :  ["class" => Session::className(), 'savePath'=>$web . '/../session'];
//
//            $config['components']['errorHandler'] = isset($config['components']['errorHandler']) ? array_merge($config['components']['errorHandler'], ["class" => ErrorHandler::className()]) : ["class" => ErrorHandler::className()];
//
//            if( isset($config['components']['log']) ){
//                $config['components']['log'] = array_merge($config['components']['log'], ["class" => Dispatcher::className(), 'logger' => Logger::className()]);
//            }
//
//            if($this->debug){
//                if( isset($config['modules']['debug']) ){
//                    $config['modules']['debug'] = array_merge($config['modules']['debug'], [
//                        "class" => Module::className(),
//                        'panels' => [
//                            'profiling' => ['class' => ProfilingPanel::className()],
//                            'timeline' => ['class' => TimelinePanel::className()],
//                        ]
//                    ]);
//                }
//            }
//
//            try {
//                $application = new Application($config);
//                yii::$app->getLog()->yiiBeginAt = $yiiBeginAt;
//                yii::$app->setAliases($aliases);
//                try {
//                    $application->state = Application::STATE_BEFORE_REQUEST;
//                    $application->trigger(Application::EVENT_BEFORE_REQUEST);
//
//                    $application->state = Application::STATE_HANDLING_REQUEST;
//                    $yiiresponse = $application->handleRequest($application->getRequest());
//
//                    $application->state = Application::STATE_AFTER_REQUEST;
//                    $application->trigger(Application::EVENT_AFTER_REQUEST);
//
//                    $application->state = Application::STATE_SENDING_RESPONSE;
//
//                    $yiiresponse->send();
//
//                    $application->state = Application::STATE_END;
//                } catch (ExitException $e) {
//                    $application->end($e->statusCode, isset($yiiresponse) ? $yiiresponse : null);
//                }
//                yii::$app->getDb()->close();
//                UploadedFile::reset();
//                yii::$app->getLog()->getLogger()->flush();
//                yii::$app->getLog()->getLogger()->flush(true);
//            }catch (\Exception $e){
//                yii::$app->getErrorHandler()->handleException($e);
//            }
//        };

        $this->stdout("server is running, listening {$this->host}:{$this->port}" . PHP_EOL);
        $server->run();
    }

    public function actionStop()
    {
        $this->sendSignal(SIGTERM);
        $this->stdout("server is stopped, stop listening {$this->host}:{$this->port}" . PHP_EOL);
    }

    public function actioReloadTask()
    {
        $this->sendSignal(SIGUSR2);
    }

    public function actionRestart()
    {
        $this->sendSignal(SIGTERM);
        $time = 0;
        while (posix_getpgid($this->getPid()) && $time <= 10) {
            usleep(100000);
            $time++;
        }
        if ($time > 100) {
            $this->stderr("Server stopped timeout" . PHP_EOL);
            exit(1);
        }
        if( $this->getPid() === false ){
            $this->stdout("Server is stopped success" . PHP_EOL);
        }else{
            $this->stderr("Server stopped error, please handle kill process" . PHP_EOL);
        }
        $this->actionStart();
    }

    public function actionReload()
    {
        $this->actionRestart();
    }

    private function sendSignal($sig)
    {
        if ($pid = $this->getPid()) {
            posix_kill($pid, $sig);
        } else {
            $this->stdout("server is not running!" . PHP_EOL);
            exit(1);
        }
    }


    private function getPid()
    {
        $pid_file = $this->swooleConfig['pid_file'];
        if (file_exists($pid_file)) {
            $pid = file_get_contents($pid_file);
            if (posix_getpgid($pid)) {
                return $pid;
            } else {
                unlink($pid_file);
            }
        }
        return false;
    }
}