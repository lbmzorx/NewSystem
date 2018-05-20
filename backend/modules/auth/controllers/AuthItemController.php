<?php

namespace backend\modules\auth\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AuthItem;
use common\models\adminsearch\AuthItem as SearchModel;
/**
 * AuthItemController implements the CRUD actions for common\models\admindata\AuthItem model.
 */
class AuthItemController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AuthItem::className();
        $this->modelNameCreate      =AuthItem::className();
        $this->modelNameUpdate      =AuthItem::className();
        $this->modelNameDelete      =AuthItem::className();
        $this->modelNameSort        =AuthItem::className();
        $this->modelNameChangeStatus=AuthItem::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
