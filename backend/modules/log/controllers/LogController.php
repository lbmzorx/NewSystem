<?php

namespace backend\modules\log\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\Log;
use common\models\adminsearch\Log as SearchModel;
/**
 * LogController implements the CRUD actions for common\models\admindata\Log model.
 */
class LogController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Log::className();
        $this->modelNameCreate      =Log::className();
        $this->modelNameUpdate      =Log::className();
        $this->modelNameDelete      =Log::className();
        $this->modelNameSort        =Log::className();
        $this->modelNameChangeStatus=Log::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
