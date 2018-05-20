<?php

namespace backend\modules\tempadmin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AdminInfo;
use common\models\adminsearch\AdminInfo as SearchModel;
/**
 * AdminInfoController implements the CRUD actions for common\models\admindata\AdminInfo model.
 */
class AdminInfoController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AdminInfo::className();
        $this->modelNameCreate      =AdminInfo::className();
        $this->modelNameUpdate      =AdminInfo::className();
        $this->modelNameDelete      =AdminInfo::className();
        $this->modelNameSort        =AdminInfo::className();
        $this->modelNameChangeStatus=AdminInfo::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
