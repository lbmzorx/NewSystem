<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\UserMessage as BaseModelUserMessage;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\admindatabase\UserMessage]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\UserMessage
*/
class UserMessage extends BaseModelUserMessage
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_admindata_UserMessage';


    const READ_UNREAD=0;
    const READ_READ=1;
    /**
    * 查看
    * 查看.tran:0=未读,1=已读.code:0=Unread,1=Read.
    * @var array $read_code
    */
    public static $read_code = [0=>'Unread',1=>'Read',];

    const STATUS_WAITING_AUDIT=0;
    const STATUS_AUDIT_PASS=1;
    const STATUS_AUDIT_FAILED=2;
    /**
    * 状态
    * 状态.tran:0=待审核,1=审核通过,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.
    * @var array $status_code
    */
    public static $status_code = [0=>'Waiting audit',1=>'Audit Pass',2=>'Audit Failed',];

    const PRIORITY_NORMAL=0;
    const PRIORITY_STRESS=1;
    const PRIORITY_URGENCY=2;
    /**
    * 优先级
    * 优先级.tran:0=正常,1=着急,2=立即.code:0=Normal,1=Stress,2=Urgency.
    * @var array $priority_code
    */
    public static $priority_code = [0=>'Normal',1=>'Stress',2=>'Urgency',];

    const SEND_TYPE_USER=0;
    const SEND_TYPE_SYSTEM=1;
    /**
    * 来源类型
    * 来源类型.tran:0=用户,1=系统.code:0=User,1=System.
    * @var array $send_type_code
    */
    public static $send_type_code = [0=>'User',1=>'System',];

    const IS_LINK_NO=0;
    const IS_LINK_YES=1;
    /**
    * 是否链接
    * 是否链接.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $is_link_code
    */
    public static $is_link_code = [0=>'No',1=>'Yes',];

    const GROUP_TYPE_PERSONAL=0;
    const GROUP_TYPE_GROUP=1;
    const GROUP_TYPE_ALL=2;
    /**
    * 分组类型
    * 分组类型.tran:0=个人,1=组,2=全体.code:0=Personal,1=Group,2=All.
    * @var array $group_type_code
    */
    public static $group_type_code = [0=>'Personal',1=>'Group',2=>'All',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'read','status','priority','send_type','is_link','group_type'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['read','send_type','is_link'], 'in', 'range' => [0,1,]],
            [['status','priority','group_type'], 'in', 'range' => [0,1,2,]],
            [['send_id','add_time'], 'default', 'value' =>'0',],
            [['read','priority','send_type','is_link','group_type'], 'default', 'value' =>0,],
            [['status'], 'default', 'value' =>1,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'id',
                'send_id',
                'to_id',
                'read',
                'status',
                'priority',
                'send_type',
                'is_link',
                'content',
                'link',
                'add_time',
                'group_type',
                'user_message_group_content_id',
            ],
            'search' => [
                'id',
                'send_id',
                'to_id',
                'read',
                'status',
                'priority',
                'send_type',
                'is_link',
                'content',
                'link',
                'add_time',
                'group_type',
                'user_message_group_content_id',
            ],
            'view' => [
                'id',
                'send_id',
                'to_id',
                'read',
                'status',
                'priority',
                'send_type',
                'is_link',
                'content',
                'link',
                'add_time',
                'group_type',
                'user_message_group_content_id',
            ],
            'update' => [
                'send_id',
                'to_id',
                'read',
                'status',
                'priority',
                'send_type',
                'is_link',
                'content',
                'link',
                'group_type',
                'user_message_group_content_id',
            ],
            'create' => [
                'send_id',
                'to_id',
                'read',
                'status',
                'priority',
                'send_type',
                'is_link',
                'content',
                'link',
                'group_type',
                'user_message_group_content_id',
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
     * @return \yii\db\ActiveQuery
     */
    public function getUserMessageGroupContent(){
        return $this->hasOne(UserMessageGroupContent::className(),['id'=>'user_message_group_content_id']);
    }

    /**
     * get relation columns
     * @return array
     */
    public static function columnRetions(){
        return [
            'user_message_group_content_id'=>'UserMessageGroupContent',
        ];
    }

    /**
     * If is tree which have parent_id
     * @return boolean
     */
    public static function isTree(){
        return false;
    }


    public function afterSave($insert , $changedAttributes)
    {
        TagDependency::invalidate(\yii::$app->cache,self::CACHE_TAG);
        parent::afterSave($insert , $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        TagDependency::invalidate(\yii::$app->cache,self::CACHE_TAG);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}
