<?php
/**
 * Created by Administrator.
 * Date: 2018/6/8 21:34
 * github: https://github.com/lbmzorx
 */
namespace common\components\event;


use yii\base\Event;

class MqEvent extends Event
{
    const EVENT_BEFORE_SEND = 'beforQtSend';
    const EVENT_AFTER_SEND = 'afterQtSend';

    public function qtSend(){

    }

}