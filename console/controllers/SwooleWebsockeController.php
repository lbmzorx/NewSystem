<?php
/**
 * Created by Administrator.
 * Date: 2018/6/26 23:40
 * github: https://github.com/lbmzorx
 */
namespace console\controllers;


use yii\console\Controller;

class SwooleWebsockeController extends Controller
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

    public $gcSessionInterval = 60000;//启动session回收的间隔时间，单位为毫秒


}