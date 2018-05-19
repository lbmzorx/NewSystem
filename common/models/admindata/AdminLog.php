<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AdminLog as BaseModelAdminLog;

/**
* This is the data class for [[common\models\admindatabase\AdminLog]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AdminLog
*/
class AdminLog extends BaseModelAdminLog
{

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['route'], 'default', 'value' =>'',],
            [['edit_time'], 'default', 'value' =>'0',],
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
                'route',
                'description',
                'add_time',
                'edit_time',
            ],
            'view' => [
                'id',
                'admin_id',
                'route',
                'description',
                'add_time',
                'edit_time',
            ],
            'update' => [
                'admin_id',
                'route',
                'description',
            ],
            'create' => [
                'admin_id',
                'route',
                'description',
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
