<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AuthAssignment;
use common\models\adminsearch\AuthAssignment as SearchModel;
/**
 * AuthAssignmentController implements the CRUD actions for common\models\admindata\AuthAssignment model.
 */
class AuthAssignmentController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AuthAssignment::className();
        $this->modelNameCreate      =AuthAssignment::className();
        $this->modelNameUpdate      =AuthAssignment::className();
        $this->modelNameDelete      =AuthAssignment::className();
        $this->modelNameSort        =AuthAssignment::className();
        $this->modelNameChangeStatus=AuthAssignment::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
