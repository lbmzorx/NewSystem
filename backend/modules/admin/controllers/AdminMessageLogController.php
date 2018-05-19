<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AdminMessageLog;
use common\models\adminsearch\AdminMessageLog as SearchModel;
/**
 * AdminMessageLogController implements the CRUD actions for common\models\admindata\AdminMessageLog model.
 */
class AdminMessageLogController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AdminMessageLog::className();
        $this->modelNameCreate      =AdminMessageLog::className();
        $this->modelNameUpdate      =AdminMessageLog::className();
        $this->modelNameDelete      =AdminMessageLog::className();
        $this->modelNameSort        =AdminMessageLog::className();
        $this->modelNameChangeStatus=AdminMessageLog::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
