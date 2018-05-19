<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AuthItem as BaseModelAuthItem;

/**
* This is the data class for [[common\models\admindatabase\AuthItem]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AuthItem
*/
class AuthItem extends BaseModelAuthItem
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
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at',
            ],
            'view' => [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at',
            ],
            'update' => [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
            ],
            'create' => [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
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
