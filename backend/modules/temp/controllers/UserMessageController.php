<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\UserMessage;
use common\models\startsearch\UserMessage as SearchModel;
/**
 * UserMessageController implements the CRUD actions for common\models\startdata\UserMessage model.
 */
class UserMessageController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =UserMessage::className();
        $this->modelNameCreate      =UserMessage::className();
        $this->modelNameUpdate      =UserMessage::className();
        $this->modelNameDelete      =UserMessage::className();
        $this->modelNameSort        =UserMessage::className();
        $this->modelNameChangeStatus=UserMessage::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
