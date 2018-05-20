<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Article;
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
        return parent::actions();
    }

}
