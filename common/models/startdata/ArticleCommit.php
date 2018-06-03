<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\ArticleCommit as BaseModelArticleCommit;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\startdatabase\ArticleCommit]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\ArticleCommit
*/
class ArticleCommit extends BaseModelArticleCommit
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_startdata_ArticleCommit';


    const STATUS_WAITING_AUDIT=0;
    const STATUS_AUDIT_PASS=1;
    const STATUS_AUDIT_FAILED=2;
    /**
    * 状态
    * 状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.
    * @var array $status_code
    */
    public static $status_code = [0=>'Waiting audit',1=>'Audit Pass',2=>'Audit Failed',];

    const RECYCLE_NO=0;
    const RECYCLE_YES=1;
    /**
    * 删除
    * 删除.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $recycle_code
    */
    public static $recycle_code = [0=>'No',1=>'Yes',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'status','recycle'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,2,]],
            [['recycle'], 'in', 'range' => [0,1,]],
            [['status'], 'default', 'value' =>1,],
            [['recycle','level'], 'default', 'value' =>0,],
            [['path'], 'default', 'value' =>'0',],
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
                'article_id',
                'user_id',
                'parent_id',
                'content',
                'status',
                'add_time',
                'recycle',
                'level',
                'path',
            ],
            'search' => [
                'id',
                'article_id',
                'user_id',
                'parent_id',
                'content',
                'status',
                'add_time',
                'recycle',
                'level',
                'path',
            ],
            'view' => [
                'id',
                'article_id',
                'user_id',
                'parent_id',
                'content',
                'status',
                'add_time',
                'recycle',
                'level',
                'path',
            ],
            'update' => [
                'article_id',
                'user_id',
                'parent_id',
                'content',
                'status',
                'recycle',
            ],
            'create' => [
                'article_id',
                'user_id',
                'parent_id',
                'content',
                'status',
                'recycle',
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
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'statuscode',
            ],
            'withOneUser'=>[
                'class' => \lbmzorx\components\behavior\WithOneUser::className(),
                'userClass'=> User::ClassName(),
            ],
            'parent_id'=>[
                'class'=>\yii\behaviors\AttributesBehavior::className(),
                'attributes'=>[
                    'parent_id'=>[
                        self::EVENT_BEFORE_INSERT=>[$this,'treeBuild'],
                        self::EVENT_BEFORE_UPDATE=>[$this,'treeBuild'],
                    ],
                ],
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
        return true;
    }

    /**
     * Build tree
     * @return mixed
     */
    public function treeBuild($event, $attribute){
        if($this->$attribute==0){
            if($this->hasAttribute('level')) $this->level=0;
            if($this->hasAttribute('path')) $this->level=0;
        }else{
            $parent_model=self::findOne($this->$attribute);
            if($parent_model){
                if($this->hasAttribute('level')) $this->level=$parent_model->level+1;
                if($this->hasAttribute('path')) $this->path=$parent_model->path.','.$parent_model->id;
            }else{
                $this->$attribute=0;
                if($this->hasAttribute('level')) $this->level=0;
                if($this->hasAttribute('path')) $this->level=0;
            }
        }
        return $this->$attribute;
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
