<?php

namespace backend\modules\setting\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Menu;
use common\models\startsearch\Menu as SearchModel;
/**
 * MenuController implements the CRUD actions for common\models\startdata\Menu model.
 */
class FrontendMenuController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Menu::className();
        $this->modelNameCreate      =Menu::className();
        $this->modelNameUpdate      =Menu::className();
        $this->modelNameDelete      =Menu::className();
        $this->modelNameSort        =Menu::className();
        $this->modelNameChangeStatus=Menu::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
