<?php
/**
 * Created by Administrator.
 * Date: 2018/5/20 20:03
 * github: https://github.com/lbmzorx
 */

namespace backend\controllers;


use common\components\job\IpLimitJob;
use common\models\startmq\QtMessageForm;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class TestController extends Controller
{
    public function actionIndex(){

//        send_id; 	// 发送者ID
//        to_id; 	// 接收者ID
//        priority; 	// 优先级.tran:0=成功,1=信息,2=警告,3=危险.code:0=Success,1=Info,2=Wairning,3=Danger.
//        send_type; 	// 来源类型.tran:0=用户,1=系统.code:0=User,1=System.
//        is_link; 	// 是否链接.tran:0=否,1=是.code:0=No,1=Yes.
//        content; 	// 消息内容
//        link; 	// 链接
//        add_time; 	// 添加时间
//        group_type; 	// 分组类型.tran:0=个人,1=组,2=全体.code:0=Personal,1=Group,2=All.
//        message_type; 	// 消息类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.
//        user_message_group_content_id; 	// 组内容

        $qt=new QtMessageForm();
        $qt->send_id=1;
        $qt->to_id=11;
        $qt->priority=1;
        $qt->send_type=1;
        $qt->is_link=1;
        $qt->content="asdfaahahah，啊恢复冷静看待".date("Y-m-d H:i:s").'-'.\yii::$app->security->generateRandomString();
        $qt->add_time=time();
        $qt->group_type=0;
        $qt->message_type=0;
        $qt->user_message_group_content_id=0;

//        $qt->sendRabbit();
        $status=$qt->sendRedis();
        var_dump($status);
        if($status===false){
            var_dump($qt->getErrors());
        }
        $statusr=$qt->sendRabbit();
        var_dump($statusr);
        if($statusr===false){
            var_dump($qt->getErrors());
        }
        return $this->renderPartial('index');
    }

    public $secretKey='mGnCQSJk6LQ9i9PUO6d0CD2c7QabUCj4';
    public function actionTc(){
       var_dump(strlen('aQCmTIaplrJ5zzaTk5r4QaCdSsA='));

        $str='asdfdasfsafdasfdsa=aklsdjflkadsjkl;fjakl;dsfjkl;adsfjkl;askljfdsa';
       var_dump(strlen(base64_encode(hash_hmac('sha256',$str, $this->secretKey, true))));
        var_dump(strlen(base64_encode(hash_hmac('sha1',$str, $this->secretKey, true))));
        $str='q6whJ4Nb2hncglJQRf2risj8QuqetguCP7b01OjQqJg=';
        var_dump(strlen(base64_encode(hash_hmac('sha256',$str, $this->secretKey, true))));
        var_dump(strlen(base64_encode(hash_hmac('sha1',$str, $this->secretKey, true))));

    }

    public function actionQu(){
        $str='s:32:"common\components\job\IpLimitJob";';
        $limitIp=new IpLimitJob();
        $limitIp->ip="82.223.36.139";
        $limitIp->msg="limit lua";

        $ser=serialize($limitIp);
//        var_dump(strlen('O:32:"common\components\job\IpLimitJob":1:{s:2:"ip";s:9:"127.0.0.1";}'));
        $a=unserialize($ser);
        var_dump($ser);

    }

}