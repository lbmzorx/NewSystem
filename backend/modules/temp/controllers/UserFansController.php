<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\UserFans;
use common\models\startsearch\UserFans as SearchModel;
/**
 * UserFansController implements the CRUD actions for common\models\startdata\UserFans model.
 */
class UserFansController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =UserFans::className();
        $this->modelNameCreate      =UserFans::className();
        $this->modelNameUpdate      =UserFans::className();
        $this->modelNameDelete      =UserFans::className();
        $this->modelNameSort        =UserFans::className();
        $this->modelNameChangeStatus=UserFans::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
