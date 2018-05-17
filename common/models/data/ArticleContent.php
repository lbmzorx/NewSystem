<?php
namespace common\models\data;

use Yii;
use common\models\data\ArticleContent as BaseModelArticleContent;

/**
* This is the data class for [[common\models\data\ArticleContent]].
* Data model definde model behavior and status code.
* @see \common\models\data\ArticleContent
*/
class ArticleContent extends BaseModelArticleContent
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
            [['seo_title','seo_keywords','seo_description'], 'default', 'value' =>'',],
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
                'content',
                'seo_title',
                'seo_keywords',
                'seo_description',
            ],
            'view' => [
                'id',
                'content',
                'seo_title',
                'seo_keywords',
                'seo_description',
            ],
            'update' => [
                'content',
                'seo_title',
                'seo_keywords',
                'seo_description',
            ],
            'create' => [
                'content',
                'seo_title',
                'seo_keywords',
                'seo_description',
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
