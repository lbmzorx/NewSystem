<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%user_message}}".
 *
 * @property string $id	//
 * @property string $send_id	// 发送者ID
 * @property string $to_id	// 接收者ID
 * @property int $read	// 查看.tran:0=未读,1=已读.code:0=Unread,1=Read.
 * @property int $status	// 状态.tran:0=待审核,1=审核通过,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.
 * @property int $priority	// 优先级.tran:0=成功,1=信息,2=警告,3=危险.code:0=Success,1=Info,2=Wairning,3=Danger.
 * @property int $send_type	// 来源类型.tran:0=用户,1=系统.code:0=User,1=System.
 * @property int $is_link	// 是否链接.tran:0=否,1=是.code:0=No,1=Yes.
 * @property string $content	// 消息内容
 * @property string $link	// 链接
 * @property string $add_time	// 添加时间
 * @property int $group_type	// 分组类型.tran:0=个人,1=组,2=全体.code:0=Personal,1=Group,2=All.
 * @property int $message_type	// 消息类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.
 * @property int $user_message_group_content_id	// 组内容
 */
class UserMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['send_id', 'to_id', 'read', 'status', 'priority', 'send_type', 'is_link', 'add_time', 'group_type', 'message_type', 'user_message_group_content_id'], 'integer'],
            [['to_id'], 'required'],
            [['content'], 'string', 'max' => 512],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'send_id' => Yii::t('model', 'Send ID'),
            'to_id' => Yii::t('model', 'To ID'),
            'read' => Yii::t('model', 'Read'),
            'status' => Yii::t('model', 'Status'),
            'priority' => Yii::t('model', 'Priority'),
            'send_type' => Yii::t('model', 'Send Type'),
            'is_link' => Yii::t('model', 'Is Link'),
            'content' => Yii::t('model', 'Content'),
            'link' => Yii::t('model', 'Link'),
            'add_time' => Yii::t('model', 'Add Time'),
            'group_type' => Yii::t('model', 'Group Type'),
            'message_type' => Yii::t('model', 'Message Type'),
            'user_message_group_content_id' => Yii::t('model', 'User Message Group Content ID'),
        ];
    }
}


