<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%user_message}}".
 *
 * @property string $id	//
 * @property string $send_id	// 发送者ID
 * @property string $to_id	// 接收者ID
 * @property int $read	// 查看.tran:0=未读,1=已读.code:0=Unread,1=Read.
 * @property int $status	// 状态.tran:0=待审核,1=审核通过,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.
 * @property int $priority	// 优先级.tran:0=正常,1=着急,2=立即.code:0=Normal,1=Stress,2=Urgency.
 * @property int $send_type	// 来源类型.tran:0=用户,1=系统.code:0=User,1=System.
 * @property int $is_link	// 是否链接.tran:0=否,1=是.code:0=No,1=Yes.
 * @property string $content	// 消息内容
 * @property string $link	// 链接
 * @property string $add_time	// 添加时间
 * @property int $group_type	// 分组类型.tran:0=个人,1=组,2=全体.code:0=Personal,1=Group,2=All.
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
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbadmin');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['send_id', 'to_id', 'read', 'status', 'priority', 'send_type', 'is_link', 'add_time', 'group_type', 'user_message_group_content_id'], 'integer'],
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
            'id' => Yii::t('amodel', 'ID'),
            'send_id' => Yii::t('amodel', 'Send ID'),
            'to_id' => Yii::t('amodel', 'To ID'),
            'read' => Yii::t('amodel', 'Read'),
            'status' => Yii::t('amodel', 'Status'),
            'priority' => Yii::t('amodel', 'Priority'),
            'send_type' => Yii::t('amodel', 'Send Type'),
            'is_link' => Yii::t('amodel', 'Is Link'),
            'content' => Yii::t('amodel', 'Content'),
            'link' => Yii::t('amodel', 'Link'),
            'add_time' => Yii::t('amodel', 'Add Time'),
            'group_type' => Yii::t('amodel', 'Group Type'),
            'user_message_group_content_id' => Yii::t('amodel', 'User Message Group Content ID'),
        ];
    }
}


