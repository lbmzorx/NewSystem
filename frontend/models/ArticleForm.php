<?php
/**
 * Created by Administrator.
 * Date: 2018/5/26 21:31
 * github: https://github.com/lbmzorx
 */

namespace frontend\models;

use common\models\startdata\Article;
use common\models\startdata\ArticleContent;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\VarDumper;

class ArticleForm extends Model
{
    public $title;
    public $article_cate_id;	// 分类ID
    public $cover;	// 封面
    public $tag;	// 标签
    public $publish;	// 发布.tran:0=草稿,1=发布.code:0=Unpublished,1=Published.
    public $recycle;	// 删除.tran:0=否,1=是.code:0=No,1=Yes.
    public $content;

    private $_article;
    private $_article_content;

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [[ 'title','content'], 'required'],
            [['article_cate_id','publish','recycle',], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['cover',], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 20],
            [['publish',], 'in', 'range' => [0,1,]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' =>Yii::t('model','Title'),
            'article_cate_id' =>Yii::t('model','Article Cate ID'),
            'cover' =>Yii::t('model','Cover'),
            'tag' =>Yii::t('model','Tag'),
            'content' =>Yii::t('model','Content'),
            'publish' =>Yii::t('model','Publish'),
        ];
    }

    public function createArticle(){
        $db=Article::getDb();
        $t=$db->beginTransaction();

        $article=new Article();
        $article->setScenario('create');
        $article->loadDefaultValues();

        $articleContent=new ArticleContent();
        $articleContent->setScenario('create');
        $articleContent->loadDefaultValues();

        $articleContent->load($this->getAttributes(),'');

        if($articleContent->save()){
            $article->load($this->getAttributes(),'');
            $article->author=\Yii::$app->user->identity->username;
            $article->user_id=\yii::$app->user->id;
            $article->article_content_id=$articleContent->id;
            if($article->save()){
                $t->commit();
                return true;
            }else{
                $this->addError('content',VarDumper::dumpAsString($articleContent->getErrors()));
                $t->rollBack();
                return false;
            }
        }else{
            $this->addError('content',VarDumper::dumpAsString($articleContent->getErrors()));
            $t->rollBack();
            return false;
        }
    }

    public function updateArticle($id){

    }

    public function findArticle($id){
        $article=Article::findOne([
            'id'=>$id,
            'user_id'=>\yii::$app->user->id,
            'recycle'=>Article::RECYCLE_NO,
            'status'=>Article::STATUS_AUDIT_PASSED,
        ]);
        if($article){
            $this->_article=$article;
            $this->_article_content=ArticleContent::findOne($article->article_content_id);
            $this->load($article->getAttributes(),'');
            $this->content=$this->_article_content?$this->_article_content->content:'';
        }
        return $this;
    }


}