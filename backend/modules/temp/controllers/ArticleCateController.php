<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\ArticleCate;
use common\models\startsearch\ArticleCate as SearchModel;
/**
 * ArticleCateController implements the CRUD actions for common\models\startdata\ArticleCate model.
 */
class ArticleCateController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =ArticleCate::className();
        $this->modelNameCreate      =ArticleCate::className();
        $this->modelNameUpdate      =ArticleCate::className();
        $this->modelNameDelete      =ArticleCate::className();
        $this->modelNameSort        =ArticleCate::className();
        $this->modelNameChangeStatus=ArticleCate::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
