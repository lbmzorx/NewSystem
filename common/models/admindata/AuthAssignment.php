<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AuthAssignment as BaseModelAuthAssignment;

/**
* This is the data class for [[common\models\admindatabase\AuthAssignment]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AuthAssignment
*/
class AuthAssignment extends BaseModelAuthAssignment
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
                'item_name',
                'user_id',
                'created_at',
            ],
            'view' => [
                'item_name',
                'user_id',
                'created_at',
            ],
            'update' => [
                'item_name',
                'user_id',
            ],
            'create' => [
                'item_name',
                'user_id',
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
                ],
            ],
//            'withOneUser'=>[
//                'class' => \lbmzorx\components\behavior\WithOneUser::className(),
//                'userClass'=> User::ClassName(),
//            ],
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
