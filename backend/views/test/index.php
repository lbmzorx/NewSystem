<?php
/**
 * Created by Administrator.
 * Date: 2018/6/3 2:05
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Url;

$pagination=new \yii\data\Pagination(['totalCount'=>100]);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>测试</title>
    <link rel="stylesheet" href="/assets/layui-v2.3.0/layui-v2.3.0/layui/css/layui.css">
</head>
<body>
<div>
<button id='ToggleConnection' type="button" onclick='ToggleConnectionClicked();'>连接服务器</button><br /><br />
<textarea id="content" ></textarea>
<button id='ToggleConnection' type="button" onclick='SendData();'>发送我的名字：beston</button><br /><br />
<button id='ToggleConnection' type="button" onclick='seestate();'>查看状态</button><br /><br />
<button id='ToggleClose' type="button" onclick='closeConnection();'>关闭链接</button><br /><br />
</div>
<script type="text/javascript" src="/assets/layui-v2.3.0/layui-v2.3.0/layui/layui.js"></script>
<script type="text/javascript" src="/assets/layer-v3.1.1/layer-v3.1.1/layer/layer.js"></script>

<script src="jquery-min.js" type="text/javascript"></script>
<script type="text/javascript">
    var ws;
    function ToggleConnectionClicked() {
        try {
            ws = new WebSocket("ws://back.local.cn:9540");//连接服务器
            ws.onopen = function(event){alert("已经与服务器建立了连接\r\n当前连接状态："+this.readyState);};
            ws.onmessage = function(event){alert("接收到服务器发送的数据：\r\n"+event.data);};
            ws.onclose = function(event){alert("已经与服务器断开连接\r\n当前连接状态："+this.readyState);};
            ws.onerror = function(event){alert("WebSocket异常！");};
        } catch (ex) {
            alert(ex.message);
        }
    }

    function SendData() {
        try{
            var content = document.getElementById("content").value;
            if(content){
                ws.send(content);
            }

        }catch(ex){
            alert(ex.message);
        }
    };

    function seestate(){
        alert(ws.readyState);
    }

    function closeConnection() {
        ws.onclose();
    }
</script>
</body>
</html>

