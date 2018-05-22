<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Tag;
use common\models\startsearch\Tag as SearchModel;
/**
 * TagController implements the CRUD actions for common\models\startdata\Tag model.
 */
class TagController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Tag::className();
        $this->modelNameCreate      =Tag::className();
        $this->modelNameUpdate      =Tag::className();
        $this->modelNameDelete      =Tag::className();
        $this->modelNameSort        =Tag::className();
        $this->modelNameChangeStatus=Tag::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
