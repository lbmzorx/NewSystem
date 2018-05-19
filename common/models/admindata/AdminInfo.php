<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AdminInfo as BaseModelAdminInfo;

/**
* This is the data class for [[common\models\admindatabase\AdminInfo]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AdminInfo
*/
class AdminInfo extends BaseModelAdminInfo
{

    const SEX_FEMALE=0;
    const SEX_MALE=1;
    /**
    * 性别
    * 性别.tran:0=女,1=男.code:0=Female,1=Male.
    * @var array $sex_code
    */
    public static $sex_code = [0=>'Female',1=>'Male',];

    const STATUS_UN_REAL_NAME=0;
    const STATUS_REAL_NAME=1;
    /**
    * 状态
    * 状态.tran:0=未实名,1=已实名.code:0=Un Real Name,1=Real Name.
    * @var array $status_code
    */
    public static $status_code = [0=>'Un Real Name',1=>'Real Name',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'sex','status'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['sex','status'], 'in', 'range' => [0,1,]],
            [['real_name','birthday','province','city','county','address','identified_card','qq'], 'default', 'value' =>'',],
            [['sex'], 'default', 'value' =>1,],
            [['status','add_time','edit_time'], 'default', 'value' =>0,],
            [['wechat','weibo','other_mongodb'], 'default', 'value' =>'0',],
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
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
                'add_time',
                'edit_time',
            ],
            'view' => [
                'id',
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
                'add_time',
                'edit_time',
            ],
            'update' => [
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
            ],
            'create' => [
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
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
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
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
    public function getAdmin(){
        return $this->hasOne(Admin::className(),['id'=>'admin_id']);
    }

    /**
     * get relation columns
     * @return array
     */
    public static function columnRetions(){
        return [
            'admin_id'=>'Admin',
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
