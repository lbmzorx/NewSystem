<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\ArticleCollection;
use common\models\startsearch\ArticleCollection as SearchModel;
/**
 * ArticleCollectionController implements the CRUD actions for common\models\startdata\ArticleCollection model.
 */
class ArticleCollectionController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =ArticleCollection::className();
        $this->modelNameCreate      =ArticleCollection::className();
        $this->modelNameUpdate      =ArticleCollection::className();
        $this->modelNameDelete      =ArticleCollection::className();
        $this->modelNameSort        =ArticleCollection::className();
        $this->modelNameChangeStatus=ArticleCollection::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
