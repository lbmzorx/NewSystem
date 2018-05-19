<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AdminMessageLog as BaseModelAdminMessageLog;

/**
* This is the data class for [[common\models\admindatabase\AdminMessageLog]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AdminMessageLog
*/
class AdminMessageLog extends BaseModelAdminMessageLog
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
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'search' => [
                'admin_message_id',
                'admin_id',
            ],
            'view' => [
                'admin_message_id',
                'admin_id',
            ],
            'update' => [
                'admin_message_id',
                'admin_id',
            ],
            'create' => [
                'admin_message_id',
                'admin_id',
            ],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminMessage(){
        return $this->hasOne(AdminMessage::className(),['id'=>'admin_message_id']);
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
            'admin_message_id'=>'AdminMessage',
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
