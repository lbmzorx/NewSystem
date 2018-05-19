<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\User as BaseModelUser;

/**
* This is the data class for [[common\models\startdatabase\User]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\User
*/
class User extends BaseModelUser
{

    const STATUS_DELETE=0;
    const STATUS_FREEZE=1;
    const STATUS_WAITING_AUDIT=2;
    const STATUS_LIMIT_LOGIN=3;
    const STATUS_LIMIT_ACTIVE=4;
    const STATUS_LOGIN_ERROR=5;
    const STATUS_ACTIVE_ERROR=6;
    const STATUS_WAITING_ACTIVE=9;
    const STATUS_ACTIVE=10;
    /**
    * 状态
    * 状态.tran:0=删除,1=冻结,2=未通过审核,3=限制登录,4=限制活动,5=登录异常,6=激活失败,9=未激活,10=正常.code:0=Delete,1=Freeze,2=Waiting audit,3=Limit Login,4=Limit Active,5=Login Error,6=Active Error,9=Waiting Active,10=Active.
    * @var array $status_code
    */
    public static $status_code = [0=>'Delete',1=>'Freeze',2=>'Waiting audit',3=>'Limit Login',4=>'Limit Active',5=>'Login Error',6=>'Active Error',9=>'Waiting Active',10=>'Active',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'status'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,2,3,4,5,6,9,10,]],
            [['status'], 'default', 'value' =>9,],
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
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at',
            ],
            'view' => [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at',
            ],
            'update' => [
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
            ],
            'create' => [
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'statuscode',
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
