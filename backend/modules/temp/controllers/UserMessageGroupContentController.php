<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\UserMessageGroupContent;
use common\models\startsearch\UserMessageGroupContent as SearchModel;
/**
 * UserMessageGroupContentController implements the CRUD actions for common\models\startdata\UserMessageGroupContent model.
 */
class UserMessageGroupContentController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =UserMessageGroupContent::className();
        $this->modelNameCreate      =UserMessageGroupContent::className();
        $this->modelNameUpdate      =UserMessageGroupContent::className();
        $this->modelNameDelete      =UserMessageGroupContent::className();
        $this->modelNameSort        =UserMessageGroupContent::className();
        $this->modelNameChangeStatus=UserMessageGroupContent::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
