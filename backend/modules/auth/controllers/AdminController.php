<?php

namespace backend\modules\auth\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\Admin;
use common\models\adminsearch\Admin as SearchModel;
/**
 * AdminController implements the CRUD actions for common\models\admindata\Admin model.
 */
class AdminController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Admin::className();
        $this->modelNameCreate      =Admin::className();
        $this->modelNameUpdate      =Admin::className();
        $this->modelNameDelete      =Admin::className();
        $this->modelNameSort        =Admin::className();
        $this->modelNameChangeStatus=Admin::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
