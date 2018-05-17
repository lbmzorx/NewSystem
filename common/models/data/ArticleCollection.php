<?php
namespace common\models\data;

use Yii;
use common\models\data\ArticleCollection as BaseModelArticleCollection;

/**
* This is the data class for [[common\models\data\ArticleCollection]].
* Data model definde model behavior and status code.
* @see \common\models\data\ArticleCollection
*/
class ArticleCollection extends BaseModelArticleCollection
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
                'id',
                'article_id',
                'user_id',
                'add_time',
            ],
            'view' => [
                'id',
                'article_id',
                'user_id',
                'add_time',
            ],
            'update' => [
                'article_id',
                'user_id',
            ],
            'create' => [
                'article_id',
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
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
            'withOneUser'=>[
                'class' => \lbmzorx\components\behavior\WithOneUser::className(),
                'userClass'=> User::ClassName(),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle(){
        return $this->hasOne(Article::className(),['id'=>'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    /**
     * get relation columns
     * @return array
     */
    public static function columnRetions(){
        return [
            'article_id'=>'Article',
            'user_id'=>'User',
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
