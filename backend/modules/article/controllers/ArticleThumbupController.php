<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\ArticleThumbup;
use common\models\startsearch\ArticleThumbup as SearchModel;
/**
 * ArticleThumbupController implements the CRUD actions for common\models\startdata\ArticleThumbup model.
 */
class ArticleThumbupController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =ArticleThumbup::className();
        $this->modelNameCreate      =ArticleThumbup::className();
        $this->modelNameUpdate      =ArticleThumbup::className();
        $this->modelNameDelete      =ArticleThumbup::className();
        $this->modelNameSort        =ArticleThumbup::className();
        $this->modelNameChangeStatus=ArticleThumbup::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
