<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 11:07
 * github: https://github.com/lbmzorx
 */
namespace common\components\job;
use common\models\startdata\UserMessage;
use common\models\startmq\QtMessageForm;
use yii\base\BaseObject;
use yii\base\Model;

class UserActionJob extends Model implements \yii\queue\JobInterface
{

    public $send_id; 	// 发送者ID
    public $to_id; 	// 接收者ID
    public $priority; 	// 优先级.tran:0=成功,1=信息,2=警告,3=危险.code:0=Success,1=Info,2=Wairning,3=Danger.
    public $send_type; 	// 来源类型.tran:0=用户,1=系统.code:0=User,1=System.
    public $is_link; 	// 是否链接.tran:0=否,1=是.code:0=No,1=Yes.
    public $content; 	// 消息内容
    public $link; 	// 链接
    public $add_time; 	// 添加时间
    public $group_type; 	// 分组类型.tran:0=个人,1=组,2=全体.code:0=Personal,1=Group,2=All.
    public $message_type; 	// 消息类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.
    public $user_message_group_content_id; 	// 组内容


    public function execute($queue){
        $qtMessage=new UserMessage();
        $qtMessage->setScenario('create');
        $qtMessage->loadDefaultValues();
        $qtMessage->load($this->getAttributes(),'');
        if($qtMessage->save()){

        }
    }


}