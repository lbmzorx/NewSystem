<?php
namespace common\models\startdata;

use common\components\tools\ModelHelper;
use Yii;
use common\models\startdatabase\ArticleThumbup as BaseModelArticleThumbup;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\startdatabase\ArticleThumbup]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\ArticleThumbup
*/
class ArticleThumbup extends BaseModelArticleThumbup
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_startdata_ArticleThumbup';


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
            'default' => [
                'id',
                'article_id',
                'user_id',
                'add_time',
            ],
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

    /**
     * user Thumbup or cancel
     * @param integer $article_id
     * @param integer $user_id
     * @return array
     */
    public static function UserThumbup($article_id,$user_id){
        if(!$article_id || !$user_id){
            return ['status'=>false,'msg'=>\yii::t('app','Parameters Error!')];
        }
        $article=Article::findOne([
            'id'=>$article_id,
            'status'=>Article::STATUS_AUDIT_PASSED,
            'auth'=>Article::AUTH_ALL_USERS,
        ]);
        if(!$article){
            return ['status'=>false,'msg'=>\yii::t('app','Article not Exist!')];
        }
        $db=static::getDb();
        $t=$db->beginTransaction();
        if($thumbup=self::findOne(['article'=>$article_id,'user_id'=>$user_id])){
            if($article && $thumbup->delete()!==false&&$article->updateCounters(['thumbup'=>-1])!==false ){
                $t->commit();
                return ['status'=>true,'msg'=>\yii::t('app','Thumbup success cancel!'),'thumbup'=>$article->thumbup,'action'=>-1];
            }else{
                $t->rollBack();
                $msg='';
                if($thumbup->hasErrors()){
                    $msg=ModelHelper::getErrorAsString($thumbup,$thumbup->getErrors());
                }
                if($article->hasErrors()){
                    $msg.=ModelHelper::getErrorAsString($article,$article->getErrors());
                }
                return ['status'=>false,'msg'=>$msg,];
            }
        }else{
            $thumbup=new ArticleThumbup();
            $thumbup->setScenario('create');
            $thumbup->load(['article'=>$article_id,'user_id'=>$user_id]);
            if($article->updateCounters(['thumbup'=>-1])&&$thumbup->save()){
                $t->commit();
                return ['status'=>true,'msg'=>\yii::t('app','Thumbup success cancel!'),'thumbup'=>$article->thumbup,'action'=>1];
            }else{
                $t->rollBack();
                return ['status'=>false,'msg'=>\yii::t('app','Thumbup Success!'),'thumbup'=>$article->thumbup];
            }
        }
    }

}
