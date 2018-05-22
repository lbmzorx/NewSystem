<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\Article as BaseModelArticle;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\startdatabase\Article]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\Article
*/
class Article extends BaseModelArticle
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_startdata_Article';


    const REMAIN_NOT_REMINDING=0;
    const REMAIN_REMAINED=1;
    /**
    * 提醒
    * 提醒.code:0=Not Reminding,1=Remained.tran:0=未提醒，1=已提醒
    * @var array $remain_code
    */
    public static $remain_code = [0=>'Not Reminding',1=>'Remained',];

    const AUTH_ALL_USERS=0;
    const AUTH_FRIEND=1;
    const AUTH_ENCRYPT=2;
    const AUTH_PRIVATE=3;
    /**
    * 权限
    * 权限.tran:0=所有人,1=好友,2=加密,3=自己.code:0=All Users,1=Friend,2=Encrypt,3=Private
    * @var array $auth_code
    */
    public static $auth_code = [0=>'All Users',1=>'Friend',2=>'Encrypt',3=>'Private',];

    const LEVEL_GARBAGE=0;
    const LEVEL_NON_NUTRITIVE=1;
    const LEVEL_GENERAL=2;
    const LEVEL_BETTER=3;
    const LEVEL_GOOD=4;
    const LEVEL_GENIUS=5;
    /**
    * 文章级别
    * 文章级别.tran:0=垃圾,1=较差,2=普通,3=较好,4=优秀,5=天才.code:0=Garbage,1=Non nutritive,2=General,3=Better,4=Good,5=Genius.
    * @var array $level_code
    */
    public static $level_code = [0=>'Garbage',1=>'Non nutritive',2=>'General',3=>'Better',4=>'Good',5=>'Genius',];

    const PUBLISH_UNPUBLISHED=0;
    const PUBLISH_PUBLISHED=1;
    /**
    * 发布
    * 发布.tran:0=草稿,1=发布.code:0=Unpublished,1=Published.
    * @var array $publish_code
    */
    public static $publish_code = [0=>'Unpublished',1=>'Published',];

    const STATUS_WAITING_AUDIT=0;
    const STATUS_AUDIT_PASSED=1;
    const STATUS_AUDITING=2;
    const STATUS_AUDIT_FAILED=3;
    /**
    * 状态值
    * 状态值.tran:0=待审核,1=审核通过,2=正在审核,3=审核不通过.code:0=Waiting Audit,1=Audit Passed,2=Auditing,3=Audit Failed.
    * @var array $status_code
    */
    public static $status_code = [0=>'Waiting Audit',1=>'Audit Passed',2=>'Auditing',3=>'Audit Failed',];

    const PAGE_TYPE_MULTI_PAGES=0;
    const PAGE_TYPE_SINGLE_PAGE=1;
    /**
    * 显示类型
    * 显示类型.tran:0=多页,1=单页.code:0=Multi Pages,1=Single Page
    * @var array $page_type_code
    */
    public static $page_type_code = [0=>'Multi Pages',1=>'Single Page',];

    const FLAG_HEADLINE_NO=0;
    const FLAG_HEADLINE_YES=1;
    /**
    * 头条
    * 头条.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_headline_code
    */
    public static $flag_headline_code = [0=>'No',1=>'Yes',];

    const FLAG_RECOMMEND_NO=0;
    const FLAG_RECOMMEND_YES=1;
    /**
    * 推荐
    * 推荐.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_recommend_code
    */
    public static $flag_recommend_code = [0=>'No',1=>'Yes',];

    const FLAG_SLIDE_SHOW_NO=0;
    const FLAG_SLIDE_SHOW_YES=1;
    /**
    * 幻灯
    * 幻灯.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_slide_show_code
    */
    public static $flag_slide_show_code = [0=>'No',1=>'Yes',];

    const FLAG_SPECIAL_RECOMMEND_NO=0;
    const FLAG_SPECIAL_RECOMMEND_YES=1;
    /**
    * 特别推荐
    * 特别推荐.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_special_recommend_code
    */
    public static $flag_special_recommend_code = [0=>'No',1=>'Yes',];

    const FLAG_ROLL_NO=0;
    const FLAG_ROLL_YES=1;
    /**
    * 滚动
    * 滚动.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_roll_code
    */
    public static $flag_roll_code = [0=>'No',1=>'Yes',];

    const FLAG_BOLD_NO=0;
    const FLAG_BOLD_YES=1;
    /**
    * 加粗
    * 加粗.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_bold_code
    */
    public static $flag_bold_code = [0=>'No',1=>'Yes',];

    const FLAG_PICTURE_NO=0;
    const FLAG_PICTURE_YES=1;
    /**
    * 图片
    * 图片.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $flag_picture_code
    */
    public static $flag_picture_code = [0=>'No',1=>'Yes',];

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
            'remain','auth','level','publish','status','page_type','flag_headline','flag_recommend','flag_slide_show','flag_special_recommend','flag_roll','flag_bold','flag_picture','recycle'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['remain','publish','page_type','flag_headline','flag_recommend','flag_slide_show','flag_special_recommend','flag_roll','flag_bold','flag_picture','recycle'], 'in', 'range' => [0,1,]],
            [['auth','status'], 'in', 'range' => [0,1,2,3,]],
            [['level'], 'in', 'range' => [0,1,2,3,4,5,]],
            [['article_cate_id','sort','remain','auth','thumbup','score','status','page_type','add_time','edit_time','flag_headline','flag_recommend','flag_slide_show','flag_special_recommend','flag_roll','flag_bold','flag_picture','recycle','admin_id'], 'default', 'value' =>0,],
            [['cover','abstract','tag'], 'default', 'value' =>'',],
            [['commit','view','collection'], 'default', 'value' =>'0',],
            [['level'], 'default', 'value' =>2,],
            [['publish'], 'default', 'value' =>1,],
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
                'article_content_id',
                'user_id',
                'article_cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'page_type',
                'add_time',
                'edit_time',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'recycle',
                'admin_id',
            ],
            'search' => [
                'id',
                'article_content_id',
                'user_id',
                'article_cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'page_type',
                'add_time',
                'edit_time',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'recycle',
                'admin_id',
            ],
            'view' => [
                'id',
                'article_content_id',
                'user_id',
                'article_cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'page_type',
                'add_time',
                'edit_time',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'recycle',
                'admin_id',
            ],
            'update' => [
                'article_content_id',
                'user_id',
                'article_cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'page_type',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'recycle',
                'admin_id',
            ],
            'create' => [
                'article_content_id',
                'user_id',
                'article_cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'page_type',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'recycle',
                'admin_id',
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
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'statuscode',
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
    public function getArticleContent(){
        return $this->hasOne(ArticleContent::className(),['id'=>'article_content_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCate(){
        return $this->hasOne(ArticleCate::className(),['id'=>'article_cate_id']);
    }


    /**
     * get relation columns
     * @return array
     */
    public static function columnRetions(){
        return [
            'article_content_id'=>'ArticleContent',
            'user_id'=>'User',
            'article_cate_id'=>'ArticleCate',
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
