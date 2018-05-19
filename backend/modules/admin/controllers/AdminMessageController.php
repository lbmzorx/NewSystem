<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AdminMessage;
use common\models\adminsearch\AdminMessage as SearchModel;
/**
 * AdminMessageController implements the CRUD actions for common\models\admindata\AdminMessage model.
 */
class AdminMessageController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AdminMessage::className();
        $this->modelNameCreate      =AdminMessage::className();
        $this->modelNameUpdate      =AdminMessage::className();
        $this->modelNameDelete      =AdminMessage::className();
        $this->modelNameSort        =AdminMessage::className();
        $this->modelNameChangeStatus=AdminMessage::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
