<?php
/**
 * Created by Administrator.
 * Date: 2018/6/11 22:35
 * github: https://github.com/lbmzorx
 */

namespace backend\modules\log\controllers;


use backend\controllers\BaseCommon;
class ServerController extends BaseCommon
{

    protected function getFiles(){

    }

    public function actionSwoole(){
        return $this->render('server');
    }

    public function actionNginx(){
        return $this->render('server');
    }

    public function actionPhp(){
        return $this->render('server');
    }

    public function actionRadis(){
        return $this->render('server');
    }

    public function actionRabbitmq(){
        return $this->render('server');
    }

    public function actionMysql(){
        return $this->render('server');
    }

    public function actionDownload(){

    }

}