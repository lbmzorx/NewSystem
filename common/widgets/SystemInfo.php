<?php
/**
 * Created for advanced-admin.
 * User: aa
 * Date: 2018/4/10 10:13
 */

namespace common\widgets;


use common\components\tools\System;
use yii\base\Widget;
use yii\helpers\Html;

class SystemInfo extends Widget
{
    public function renderProcess($total,$now,$min=0,$optionProcess=[],$optionBar=[]){
        $percent=round(($now-$min)/(($total-$min)==0?1:($total-$min))*100,2);

        if(empty($optionBar['aria-color'])){
            $colormode=210;
        }else{
            $colormode=$optionBar['aria-color'];
        }
        $color=$this->colorMode($colormode,$percent,(isset($optionBar['aria-color-default'])?$optionBar['aria-color-default']:80));
        list($red,$green,$blue)=$color;

        if(empty($optionProcess['class'])){
            $optionProcess['class']='progress progress-striped';
        }
        if(empty($optionBar['class'])){
            $optionBar['class']='progress-bar progress-bar-info';
        }
        $optionBar=array_merge($optionBar,[
            'role'=>'progressbar',
            'aria-valuenow'=>$now,
            'aria-valuemin'=>$min,
            'aria-valuemax'=>$total,
            'style'=>"width:{$percent}%;background-color: rgb({$red},{$green},{$blue})",
        ]);
        $inner=(isset($optionBar['aria-inner'])&&$optionBar['aria-inner']=='1')?"<span class=\"sr-only\">{$percent}%</span>":($percent.'%');
        $process=Html::tag('div',
            Html::tag('div',$inner,$optionBar),
            $optionProcess);
        return $process;
    }

    /**
     * $color 颜色模式 随着数值增大，颜色渐变，默认210
     * 210 由绿变红 120 由红变绿
     * 201 由蓝变红 102 由红变蓝
     * 021 由蓝变绿 012 由绿变蓝
     * @param $colorMode
     * @param $percent
     * @param int $default
     * @return array
     */
    protected function colorMode($colorMode,$percent,$default=80){
        $r=intval(255*$percent/100);
        $g=intval(255-255*$percent/100);
        $b=$default;
        switch ($colorMode){
            case 210:       //由绿变红(0,255,80) -> (255,0,80)
                $rgb= [$r,$g,$b];
                break;
            case 120:        //由红变绿(0,255,80) -> (255,0,80)
                $rgb=  [$g,$r,$b];
                break;
            case 201:       //由蓝变红(0,80,255) -> (255,80,0)
                $rgb=  [$r,$b,$g];
                break;
            case 102:       //由红变蓝(255,80,0) -> (0,80,255)
                $rgb=  [$g,$b,$r];
                break;
            case 021:        //由蓝变绿(80,0,255) -> (80,255,0)
                $rgb=  [$b,$r,$g];
                break;
            case 012:        //由绿变蓝(80,255,0) -> (80,0,255)
                $rgb=  [$b,$g,$r];
                break;
            default:        //由绿变红(0,255,80) -> (255,0,80)
                $rgb=  [$r,$g,$b];
                break;
        }
        return $rgb;
    }


}