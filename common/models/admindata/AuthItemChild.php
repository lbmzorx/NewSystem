<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\AuthItemChild as BaseModelAuthItemChild;

/**
* This is the data class for [[common\models\admindatabase\AuthItemChild]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\AuthItemChild
*/
class AuthItemChild extends BaseModelAuthItemChild
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
                'parent',
                'child',
            ],
            'view' => [
                'parent',
                'child',
            ],
            'update' => [
                'parent',
                'child',
            ],
            'create' => [
                'parent',
                'child',
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
