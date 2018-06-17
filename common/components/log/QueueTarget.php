<?php
/**
 * Created by Administrator.
 * Date: 2018/6/16 22:07
 * github: https://github.com/lbmzorx
 */
namespace common\components\log;

use Yii;
use yii\log\Target;
use yii\queue\cli\Queue;
class QueueTarget extends Target
{
    public $queue;
    public $job;

    public $rules;

    public $only;

    public function export()
    {
        // TODO: Implement export() method.
        if( \yii::$app->has($this->queue) &&
            \yii::$app->{$this->queue} instanceof Queue
            && class_exists($this->job)
            && $this->rules()
        ){
            $text=isset($this->messages[0]) && isset($this->messages[0][0])?isset($this->messages[0][0]):'';
            Yii::$app->{$this->queue}->push(new $this->job([
                'ip'=>\yii::$app->request->getUserIP(),
                'msg'=>$text,
            ]));
        }
    }

    public function rules(){
        foreach ($this->rules as $rule){
            if(preg_match('/'.$rule.'/',\yii::$app->request->url)){
                return true;
            }
        }
        return false;
    }
}