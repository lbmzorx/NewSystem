<?php
/**
 * Created by Administrator.
 * Date: 2018/5/20 20:03
 * github: https://github.com/lbmzorx
 */

namespace backend\controllers;


use common\models\admindata\Log;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class TestController extends Controller
{
    public function actionIndex(){
        return $this->renderPartial('index');
    }

}