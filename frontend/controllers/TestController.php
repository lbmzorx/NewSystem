<?php
/**
 * Created by Administrator.
 * Date: 2018/6/11 20:55
 * github: https://github.com/lbmzorx
 */

namespace frontend\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){

        return $this->render('index');
    }
}