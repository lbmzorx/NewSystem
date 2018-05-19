<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AuthRule;
use common\models\adminsearch\AuthRule as SearchModel;
/**
 * AuthRuleController implements the CRUD actions for common\models\admindata\AuthRule model.
 */
class AuthRuleController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AuthRule::className();
        $this->modelNameCreate      =AuthRule::className();
        $this->modelNameUpdate      =AuthRule::className();
        $this->modelNameDelete      =AuthRule::className();
        $this->modelNameSort        =AuthRule::className();
        $this->modelNameChangeStatus=AuthRule::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
