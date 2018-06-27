<?php

/**
 * Created by Administrator.
 * Date: 2018/6/25 22:58
 * github: https://github.com/lbmzorx
 */

class WebsocketServer
{
    public $swoole;

    public $config = ['gcSessionInterval' => 60000];

    public $runApp;

    public function __construct($host, $port, $mode, $socketType, $swooleConfig=[], $config=[])
    {
        $this->swoole = new swoole_websocket_server($host, $port, $mode, $socketType);

        if( !empty($this->config) ) $this->config = array_merge($this->config, $config);
        $this->swoole->set($swooleConfig);

        $this->swoole->on('open', [$this,'onOpen']);

        $this->swoole->on('message',[$this,'onMessage']);

        $this->swoole->on('request',[$this,'onRequest']);

        $this->swoole->on('close', [$this,'onClose']);
    }

    /**
     * 启动服务
     */
    public function run()
    {
        $this->swoole->start();
    }

    /**
     * handshake 握手
     * @param \swoole_websocket_server $server
     * @param $request
     */
    public function onOpen(swoole_websocket_server $server,$request){
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(swoole_websocket_server $server, $frame){
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server");
    }

    public function onClose(swoole_websocket_server $server, $frame){
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "this is server");
    }

    /**
     * @param \swoole_http_request $request
     * @param \swoole_http_response $response
     */
    public function onRequest($request, $response)
    {
        //拦截无效请求
        //$this->rejectUnusedRequest($request, $response);

        //静态资源服务器
        //$this->staticRequest($request, $response);

        //转换$_FILE超全局变量
        $this->mountGlobalFilesVar($request);

        call_user_func_array($this->runApp, [$request, $response]);
    }

    /**
     * @param \swoole_http_request $request
     */
    private function mountGlobalFilesVar($request)
    {
        if( isset($request->files) ) {
            $files = $request->files;
            foreach ($files as $k => $v) {
                if( isset($v['name']) ){
                    $_FILES = $files;
                    break;
                }
                foreach ($v as $key => $val) {
                    $_FILES[$k]['name'][$key] = $val['name'];
                    $_FILES[$k]['type'][$key] = $val['type'];
                    $_FILES[$k]['tmp_name'][$key] = $val['tmp_name'];
                    $_FILES[$k]['size'][$key] = $val['size'];
                    if(isset($val['error'])) $_FILES[$k]['error'][$key] = $val['error'];
                }
            }
        }
        $_GET = isset($request->get) ? $request->get : [];
        $_POST = isset($request->post) ?  $request->post : [];
        $_COOKIE = isset($request->cookie) ?  $request->cookie : [];

        $server = isset($request->server) ? $request->server : [];
        $header = isset($request->header) ? $request->header : [];
        foreach ($server as $key => $value) {
            $_SERVER[strtoupper($key)] = $value;
            unset($server[$key]);
        }
        foreach ($header as $key => $value) {
            $_SERVER['HTTP_'.strtoupper($key)] = $value;
        }
        $_SERVER['SERVER_SOFTWARE'] = "swoole/" . SWOOLE_VERSION;
    }

}