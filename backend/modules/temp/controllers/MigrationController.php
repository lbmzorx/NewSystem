<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Migration;
use common\models\startsearch\Migration as SearchModel;
/**
 * MigrationController implements the CRUD actions for common\models\startdata\Migration model.
 */
class MigrationController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Migration::className();
        $this->modelNameCreate      =Migration::className();
        $this->modelNameUpdate      =Migration::className();
        $this->modelNameDelete      =Migration::className();
        $this->modelNameSort        =Migration::className();
        $this->modelNameChangeStatus=Migration::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
