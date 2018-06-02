<?php

namespace backend\modules\tempadmin\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\YiiLog;
use common\models\adminsearch\YiiLog as SearchModel;
/**
 * YiiLogController implements the CRUD actions for common\models\admindata\YiiLog model.
 */
class YiiLogController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =YiiLog::className();
        $this->modelNameCreate      =YiiLog::className();
        $this->modelNameUpdate      =YiiLog::className();
        $this->modelNameDelete      =YiiLog::className();
        $this->modelNameSort        =YiiLog::className();
        $this->modelNameChangeStatus=YiiLog::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
