<?php
/**
 * Created by Administrator.
 * Date: 2018/6/8 0:19
 * github: https://github.com/lbmzorx
 */
namespace console\controllers;

use yii\console\Controller;
use yii\helpers\FileHelper;

/**
 * 主要功能是要处理队列，处理各种并将它们放置到正确的数据库中
 * Class UserMessageController
 * @package console\controllers
 */
class ChatController extends Controller
{

    /**
     * 服务地址
     * @var string
     */
    public $bind = "0.0.0.0";

    /**
     * 服务端口
     * @var int
     */
    public $port = 9999;

    public $mode = SWOOLE_PROCESS;
    public $socketType = SWOOLE_TCP;
    public $swooleConfig = [];

    public $queueDriver='redis';
    public $driverConfig=[];

    public function actionStart(){
        if( $this->getPid() !== false ){
            $this->stderr("server already  started");
            exit(1);
        }

        $serv = new swoole_websocket_server($this->bind,$this->port);
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

        $pidDir = dirname($this->swooleConfig['pid_file']);
        if( !file_exists($pidDir) ) FileHelper::createDirectory($pidDir);

        //加载配置文件?


        return false;
    }
}