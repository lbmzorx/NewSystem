<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\Attention as BaseModelAttention;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\startdatabase\Attention]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\Attention
*/
class Attention extends BaseModelAttention
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_startdata_Attention';


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
            [['sort'], 'default', 'value' =>0,],
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
                'name',
                'value',
                'sign',
                'sort',
            ],
            'search' => [
                'id',
                'name',
                'value',
                'sign',
                'sort',
            ],
            'view' => [
                'id',
                'name',
                'value',
                'sign',
                'sort',
            ],
            'update' => [
                'name',
                'value',
                'sign',
                'sort',
            ],
            'create' => [
                'name',
                'value',
                'sign',
                'sort',
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
