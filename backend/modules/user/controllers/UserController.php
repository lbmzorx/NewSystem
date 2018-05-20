<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\User;
use common\models\startsearch\User as SearchModel;
/**
 * UserController implements the CRUD actions for common\models\startdata\User model.
 */
class UserController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =User::className();
        $this->modelNameCreate      =User::className();
        $this->modelNameUpdate      =User::className();
        $this->modelNameDelete      =User::className();
        $this->modelNameSort        =User::className();
        $this->modelNameChangeStatus=User::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
