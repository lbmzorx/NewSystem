<?php
/**
 * Created by Administrator.
 * Date: 2018/6/23 14:41
 * github: https://github.com/lbmzorx
 */

namespace common\components\event;


use yii\base\Event;

class AduitEvent extends Event
{
    const EVENT_BEFORE_ADUIT='beforeAduit';
    const EVENT_ADUIT_FAILED='aduitFailed';
    const EVENT_ADUIT_SUCCESS='aduitSuccess';
    const EVENT_AFTER_ADUIT='afterAduit';
}