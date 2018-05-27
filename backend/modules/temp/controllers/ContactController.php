<?php

namespace backend\modules\temp\controllers;

use Yii;
use backend\controllers\BaseCommon;
use common\models\startdata\Contact;
use common\models\startsearch\Contact as SearchModel;
/**
 * ContactController implements the CRUD actions for common\models\startdata\Contact model.
 */
class ContactController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =Contact::className();
        $this->modelNameCreate      =Contact::className();
        $this->modelNameUpdate      =Contact::className();
        $this->modelNameDelete      =Contact::className();
        $this->modelNameSort        =Contact::className();
        $this->modelNameChangeStatus=Contact::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return parent::actions();
    }

}
