<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\UrlCheck;
use common\models\startsearch\UrlCheck as SearchModel;
/**
 * UrlCheckController implements the CRUD actions for common\models\startdata\UrlCheck model.
 */
class UrlCheckController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =UrlCheck::className();
        $this->modelNameCreate      =UrlCheck::className();
        $this->modelNameUpdate      =UrlCheck::className();
        $this->modelNameDelete      =UrlCheck::className();
        $this->modelNameSort        =UrlCheck::className();
        $this->modelNameChangeStatus=UrlCheck::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
