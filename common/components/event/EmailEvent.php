<?php
namespace common\components\event;
use yii\base\Event;

/**
 * Created by Administrator.
 * Date: 2018/5/26 15:46
 * github: https://github.com/lbmzorx
 */
class EmailEvent extends Event
{
    const EVENT_BEFORE_EMAIL='beforeEmail';
    const EVENT_SUCCESS_EMAIL='successEmail';
    const EVENT_FAILED_EMAIL='failedEmail';
    const ENENT_AFTER_EMAIL='afterEmail';
}