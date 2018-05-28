<?php
/**
 * Created by Administrator.
 * Date: 2018/5/26 21:31
 * github: https://github.com/lbmzorx
 */

namespace frontend\models;

use common\models\startdata\Article;
use common\models\startdata\ArticleCommit;
use common\models\startdata\ArticleContent;
use common\models\startdata\Options;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\VarDumper;

class ArticleCommitForm extends Model
{
    public $article_id;	// 删除.tran:0=否,1=是.code:0=No,1=Yes.
    public $parent_id;
    public $content;

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['content','article_id'], 'required'],
            [['parent_id','article_id',], 'integer'],
            ['article_id','exist','targetClass'=>Article::className(),'targetAttribute'=>'id'],
            ['parent_id','exist', 'skipOnEmpty' => true,'targetAttribute'=>'id'],
            ['parent_id','default','value'=>0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' =>Yii::t('model','Article Id'),
            'content' =>Yii::t('model','Content'),
            'parent_id' =>Yii::t('model','Parent Id'),
        ];
    }

    /**
     * @return bool
     */
    public function createArticleCommit(){
        $db=ArticleCommit::getDb();
        if(isset(\yii::$app->params['website_comment'])&&\yii::$app->params['website_comment']==ArticleCommit::STATUS_AUDIT_PASS){
            $t=$db->beginTransaction();

            $article=Article::findOne([
                'id'=>$this->article_id,
                'status'=>Article::STATUS_AUDIT_PASSED,
                'recycle'=>Article::RECYCLE_NO,
            ]);

            $articleCommit=new ArticleCommit();
            $articleCommit->setScenario('create');
            $articleCommit->loadDefaultValues();
            $articleCommit->load($this->attributes,'');
            $articleCommit->status=isset(\yii::$app->params['website_comment_need_verify'])?\yii::$app->params['website_comment_need_verify']:0;
            $articleCommit->user_id=\yii::$app->user->id;
            if($articleCommit->save() && $article->updateCounters(['commit'=>1])){
                $t->commit();
                return true;
            }else{
                $t->rollBack();
                if($articleCommit->hasErrors()){
                    $this->addErrors($articleCommit->getErrors(array_keys($this->attributes)));
                    if(!$this->hasErrors()){
                        $err=ModelHelper::getErrorAsString($articleCommit,$articleCommit->getErrors());
                        $this->addError('content',$err);
                    }
                }else{
                    $err=ModelHelper::getErrorAsString($article,$article->getErrors());
                    $this->addError('content',$err);
                }
                return false;
            }
        }else{
            \yii::$app->session->setFlash('error',\yii::t('app','Website is not allow to commit!').VarDumper::dumpAsString(\yii::$app->params));
            return false;
        }
    }
}