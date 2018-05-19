<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AdminMessage as BaseModelAdminMessage;

/**
* This is the data class for [[common\models\admindatabase\AdminMessage]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AdminMessage
*/
class AdminMessage extends BaseModelAdminMessage
{

    const SPREAD_TYPE_BROADCAST=0;
    const SPREAD_TYPE_GROUP=1;
    const SPREAD_TYPE_PRIVATE=2;
    /**
    * 消息类型
    * 消息类型.tran:0=广播,1=组,2=私信.code:0=Broadcast,1=Group,2=Private.
    * @var array $spread_type_code
    */
    public static $spread_type_code = [0=>'Broadcast',1=>'Group',2=>'Private',];

    const LEVEL_NOMAL=0;
    const LEVEL_1STAR=1;
    const LEVEL_2STAR=2;
    const LEVEL_3STAR=3;
    const LEVEL_4STAR=4;
    const LEVEL_5STAR=5;
    /**
    * 级别
    * 级别.tran:0=一般,1=1星,2=2星,3=3星,4=4星,5=5星.code:0=Nomal,1=1Star,2=2Star,3=3Star,4=4Star,5=5Star
    * @var array $level_code
    */
    public static $level_code = [0=>'Nomal',1=>'1Star',2=>'2Star',3=>'3Star',4=>'4Star',5=>'5Star',];

    const READ_UNREAD=0;
    const READ_READ=1;
    /**
    * 已读
    * 已读.tran:0=未读,1=已读.code:0=Unread,1=Read.
    * @var array $read_code
    */
    public static $read_code = [0=>'Unread',1=>'Read',];

    const FROM_TYPE_ADMIN=0;
    const FROM_TYPE_USER=1;
    const FROM_TYPE_GUEST=2;
    const FROM_TYPE_OPERATE_SYSTEM=10;
    const FROM_TYPE_OTHER=11;
    /**
    * 来源类型
    * 来源类型.tran:0=管理员,1=用户,2=路人,10=操作系统,11=其他.code:0=Admin,1=User,2=Guest,10=Operate System,11=Other.
    * @var array $from_type_code
    */
    public static $from_type_code = [0=>'Admin',1=>'User',2=>'Guest',10=>'Operate System',11=>'Other',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'spread_type','level','read','from_type'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['spread_type'], 'in', 'range' => [0,1,2,]],
            [['level'], 'in', 'range' => [0,1,2,3,4,5,]],
            [['read'], 'in', 'range' => [0,1,]],
            [['from_type'], 'in', 'range' => [0,1,2,10,11,]],
            [['to_admin_id','from_admin_id'], 'default', 'value' =>'0',],
            [['spread_type'], 'default', 'value' =>3,],
            [['level','read','from_type','add_time'], 'default', 'value' =>0,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'search' => [
                'id',
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
                'add_time',
            ],
            'view' => [
                'id',
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
                'add_time',
            ],
            'update' => [
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
            ],
            'create' => [
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'astatuscode',
            ],
        ];
    }




    /**
     * If is tree which have parent_id
     * @return boolean
     */
    public static function isTree(){
        return false;
    }

}
