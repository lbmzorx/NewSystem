<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%admin_message}}".
 *
 * @property string $id	//
 * @property string $to_admin_id	// 收信管理员
 * @property string $from_admin_id	// 发信管理员
 * @property int $spread_type	// 消息类型.tran:0=广播,1=组,2=私信.code:0=Broadcast,1=Group,2=Private.
 * @property int $level	// 级别.tran:0=一般,1=1星,2=2星,3=3星,4=4星,5=5星.code:0=Nomal,1=1Star,2=2Star,3=3Star,4=4Star,5=5Star
 * @property string $name	// 消息名
 * @property string $content	// 内容
 * @property int $read	// 已读.tran:0=未读,1=已读.code:0=Unread,1=Read.
 * @property int $from_type	// 来源类型.tran:0=管理员,1=用户,2=路人,10=操作系统,11=其他.code:0=Admin,1=User,2=Guest,10=Operate System,11=Other.
 * @property int $add_time	// 添加时间
 */
class AdminMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_message}}';
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
            [['to_admin_id', 'from_admin_id', 'spread_type', 'level', 'read', 'from_type', 'add_time'], 'integer'],
            [['name', 'content'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'to_admin_id' => Yii::t('amodel', 'To Admin ID'),
            'from_admin_id' => Yii::t('amodel', 'From Admin ID'),
            'spread_type' => Yii::t('amodel', 'Spread Type'),
            'level' => Yii::t('amodel', 'Level'),
            'name' => Yii::t('amodel', 'Name'),
            'content' => Yii::t('amodel', 'Content'),
            'read' => Yii::t('amodel', 'Read'),
            'from_type' => Yii::t('amodel', 'From Type'),
            'add_time' => Yii::t('amodel', 'Add Time'),
        ];
    }
}


