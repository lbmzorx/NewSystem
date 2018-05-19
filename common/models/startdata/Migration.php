<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\Migration as BaseModelMigration;

/**
* This is the data class for [[common\models\startdatabase\Migration]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\Migration
*/
class Migration extends BaseModelMigration
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
                'version',
                'apply_time',
            ],
            'view' => [
                'version',
                'apply_time',
            ],
            'update' => [
                'version',
                'apply_time',
            ],
            'create' => [
                'version',
                'apply_time',
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
