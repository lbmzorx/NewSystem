<?php

namespace backend\modules\tempadmin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\Maintain;
use common\models\adminsearch\Maintain as SearchModel;
/**
 * MaintainController implements the CRUD actions for common\models\admindata\Maintain model.
 */
class MaintainController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Maintain::className();
        $this->modelNameCreate      =Maintain::className();
        $this->modelNameUpdate      =Maintain::className();
        $this->modelNameDelete      =Maintain::className();
        $this->modelNameSort        =Maintain::className();
        $this->modelNameChangeStatus=Maintain::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
