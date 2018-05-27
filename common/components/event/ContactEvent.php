<?php
namespace common\components\event;
use yii\base\Event;

/**
 * Created by Administrator.
 * Date: 2018/5/26 15:46
 * github: https://github.com/lbmzorx
 */
class ContactEvent extends Event
{
    const EVENT_BEFORE_CONTACT='beforeContact';
    const EVENT_SUCCESS_CONTACT='successContact';
    const EVENT_FAILED_CONTACT='failedContact';
    const ENENT_AFTER_CONTACT='afterContact';
}