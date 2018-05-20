<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\ArticleCommit;
use common\models\startsearch\ArticleCommit as SearchModel;
/**
 * ArticleCommitController implements the CRUD actions for common\models\startdata\ArticleCommit model.
 */
class ArticleCommitController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =ArticleCommit::className();
        $this->modelNameCreate      =ArticleCommit::className();
        $this->modelNameUpdate      =ArticleCommit::className();
        $this->modelNameDelete      =ArticleCommit::className();
        $this->modelNameSort        =ArticleCommit::className();
        $this->modelNameChangeStatus=ArticleCommit::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
