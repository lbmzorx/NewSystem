<?php

namespace backend\modules\tempadmin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AuthItemChild;
use common\models\adminsearch\AuthItemChild as SearchModel;
/**
 * AuthItemChildController implements the CRUD actions for common\models\admindata\AuthItemChild model.
 */
class AuthItemChildController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AuthItemChild::className();
        $this->modelNameCreate      =AuthItemChild::className();
        $this->modelNameUpdate      =AuthItemChild::className();
        $this->modelNameDelete      =AuthItemChild::className();
        $this->modelNameSort        =AuthItemChild::className();
        $this->modelNameChangeStatus=AuthItemChild::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
