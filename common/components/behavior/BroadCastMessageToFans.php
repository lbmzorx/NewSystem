<?php
/**
 * Created by Administrator.
 * Date: 2018/6/20 20:42
 * github: https://github.com/lbmzorx
 */

namespace common\components\behavior;


use common\components\job\UserActionJob;
use common\models\startdata\UserFans;
use common\models\startdata\UserMessageGroupContent;
use yii\base\Behavior;
use yii\base\InvalidParamException;
use yii\db\ActiveRecord;
use yii\queue\closure\Job;

class BroadCastMessageToFans extends Behavior
{
    public $user_id;
    public $job;
    public $jobParams=[];

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT=>"insertMessage",
        ]; // TODO: Change the autogenerated stub
    }

    public function broadcastMessage($event){
        /**
         * @var $model ActiveRecord
         */
        $model=$event->sender;

        $fans=UserFans::find()->select('fans_id')->where(['attention_id'=>$this->user_id])->column();

        $this->jobParams=$this->getJobParams($model);
        if($this->job instanceof \Closure){
            $job=call_user_func($this->job,$this->jobParams);
        }elseif(is_string($this->job) && class_exists($this->job)){
            $this->jobParams=array_merge(['class'=>$this->job]);
            $job = \yii::CreateObject($this->jobParams);
        }elseif($this->job instanceof Job){
            $job=$this->job;
        }else{
            throw new InvalidParamException("Invalid job parameters!");
        }

        /**
         * not need publish all content for group content
         */
        $content=new UserMessageGroupContent();
        $content->content=$job->content;
        $content->save();
        $job->user_message_group_content_id=$content->id;
        $job->content='';

        foreach ($fans as $fan){
            $job->to_id=$fan;
            \yii::$app->rabbitqueue->push($job);
        }
    }

    protected function getJobParams($model){
        if($this->jobParams){
            $jobParams=[];
            foreach ($this->jobParams as $key=>$params){
                if($params instanceof \Closure){
                    $jobParams[$key]=call_user_func($params,[$model]);
                }else{
                    $jobParams[$key]=$params;
                }
            }
            return $jobParams;
        }
        return [];
    }

}