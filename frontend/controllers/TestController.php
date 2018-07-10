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
        $c=null;
        $e='';
        $f=false;
        $b=[];

        var_dump(($b??111),($c??222),($e??333),($f??444));

//        return $this->render('index');
    }
}