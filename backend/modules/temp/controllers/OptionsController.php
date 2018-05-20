<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Options;
use common\models\startsearch\Options as SearchModel;
/**
 * OptionsController implements the CRUD actions for common\models\startdata\Options model.
 */
class OptionsController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Options::className();
        $this->modelNameCreate      =Options::className();
        $this->modelNameUpdate      =Options::className();
        $this->modelNameDelete      =Options::className();
        $this->modelNameSort        =Options::className();
        $this->modelNameChangeStatus=Options::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
