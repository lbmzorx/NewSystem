<?php
/**
 * Created by Administrator.
 * Date: 2018/6/13 20:11
 * github: https://github.com/lbmzorx
 */
namespace backend\modules\admin\controllers;


use backend\controllers\BaseCommon;

class MessageController extends BaseCommon
{
    public function actionSend(){
        return $this->render('send');
    }
}