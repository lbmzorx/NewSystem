<?php
namespace backend\controllers;

use Yii;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class Base extends Controller
{
    public function init(){
        parent::init();

        if(isset(\yii::$app->params['layout'])){
            $this->layout=\yii::$app->params['layout'];
        }

    }
}
