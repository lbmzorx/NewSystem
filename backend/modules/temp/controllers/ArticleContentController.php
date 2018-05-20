<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\ArticleContent;
use common\models\startsearch\ArticleContent as SearchModel;
/**
 * ArticleContentController implements the CRUD actions for common\models\startdata\ArticleContent model.
 */
class ArticleContentController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =ArticleContent::className();
        $this->modelNameCreate      =ArticleContent::className();
        $this->modelNameUpdate      =ArticleContent::className();
        $this->modelNameDelete      =ArticleContent::className();
        $this->modelNameSort        =ArticleContent::className();
        $this->modelNameChangeStatus=ArticleContent::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
