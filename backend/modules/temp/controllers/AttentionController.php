<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Attention;
use common\models\startsearch\Attention as SearchModel;
/**
 * AttentionController implements the CRUD actions for common\models\startdata\Attention model.
 */
class AttentionController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Attention::className();
        $this->modelNameCreate      =Attention::className();
        $this->modelNameUpdate      =Attention::className();
        $this->modelNameDelete      =Attention::className();
        $this->modelNameSort        =Attention::className();
        $this->modelNameChangeStatus=Attention::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
