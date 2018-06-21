<?php
/**
 * Created by Administrator.
 * Date: 2018/6/21 21:43
 * github: https://github.com/lbmzorx
 */

namespace common\components\tools;


use yii\base\BaseObject;

class RabbitmqManager extends BaseObject
{
    public $user_id;
    public $host='127.0.0.1';
    public $port='15672';


    public function render($route){
        $content=file_get_contents($this->host.':'.$this->port);

        return $content;
    }

    public function route(){

    }

}