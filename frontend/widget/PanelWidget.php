<?php
/**
 * Created by Administrator.
 * Date: 2018/5/20 15:40
 * github: https://github.com/lbmzorx
 */

namespace frontend\widget;


use yii\base\Widget;
use yii\helpers\Html;

class PanelWidget extends Widget
{
    public $options=[];

    public $isHead=true;
    public $headTitle='';
    public $headOptions=[];

    public $isBody=true;
    public $bodyData=[];
    public $bodyOptions=[];

    public function init(){
        if(empty($this->options['class'])){
            $this->options['class']='panel';
        }
        if($this->isHead==true && empty($this->headOptions['class'])){
            $this->headOptions['class']='panel-heading';
        }
        if($this->isBody==true && empty($this->bodyOptions['class'])){
            $this->bodyOptions['class']='panel-body';
        }
    }

    public function run(){
        echo $this->renderPanel();
    }

    public function renderPanel(){
        $head='';
        if($this->isHead){
            $head=Html::tag('div',$this->getHeadContent(),$this->headOptions);
        }
        $body='';
        if($this->isBody){
            $body=Html::tag('div',$this->getBodyContent(),$this->bodyOptions);
        }
        $str=Html::tag('div',$head.$body,$this->options);
        return $str;
    }

    /**
     * you should defined head content by conditions.
     * @return string
     */
    public function getHeadContent(){
        return '';
    }

    /**
     * you should defined body content by conditions.
     * @return string
     */
    public function getBodyContent(){
        return '';
    }
}