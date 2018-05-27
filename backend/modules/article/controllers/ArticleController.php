<?php
namespace backend\modules\article\controllers;

use common\models\startdata\ArticleContent;
use common\models\tool\UploadImg;
use lbmzorx\components\action\MutiUpdateAction;
use lbmzorx\components\action\UploadAction;
use lbmzorx\components\action\MutiCreateAction;
use Yii;
use backend\controllers\BaseCommon;
use backend\models\Article;
use common\models\startsearch\Article as SearchModel;
/**
 * ArticleController implements the CRUD actions for common\models\startdata\Article model.
 */
class ArticleController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Article::className();
        $this->modelNameCreate      =Article::className();
        $this->modelNameUpdate      =Article::className();
        $this->modelNameDelete      =Article::className();
        $this->modelNameSort        =Article::className();
        $this->modelNameChangeStatus=Article::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array_merge( parent::actions(),[
            'create'=>[
                'class' => MutiCreateAction::className(),
                'modelClass' =>$this->modelNameCreate,
                'depandeClass'=>[
                    'class'=>ArticleContent::className(),
                    'condition'=>['id'=>'{model:article_content_id}'],  //依赖关系
                ],
            ],
            'update'=>[
                'class' => MutiUpdateAction::className(),
                'modelClass' =>$this->modelNameUpdate,
                'depandeClass'=>[
                    'class'=>ArticleContent::className(),
                    'condition'=>['id'=>'{model:article_content_id}'],  //依赖关系
                ],
            ],
            'upload'=>[
                'class'=>UploadAction::className(),
                'modelClass' => Article::className(),
                'imgAttribute'=>'imageFile',
                'imgClass'=>UploadImg::className(),
            ],
        ]);
    }
}
