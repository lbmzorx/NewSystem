<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AdminLog;
use common\models\adminsearch\AdminLog as SearchModel;
/**
 * AdminLogController implements the CRUD actions for common\models\admindata\AdminLog model.
 */
class AdminLogController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AdminLog::className();
        $this->modelNameCreate      =AdminLog::className();
        $this->modelNameUpdate      =AdminLog::className();
        $this->modelNameDelete      =AdminLog::className();
        $this->modelNameSort        =AdminLog::className();
        $this->modelNameChangeStatus=AdminLog::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
