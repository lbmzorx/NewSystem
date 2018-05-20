<?php
/**
 * Created for advanced-admin.
 * User: aa
 * Date: 2018/4/10 10:13
 */
namespace common\widgets;


use common\components\tools\System;
class SystemDfInfo extends SystemInfo
{
    public $dfOption=[];
    public $dfBarOption=[];

    public function run()
    {
        echo $this->renderDf();
    }

    public function renderDf(){
        $df=System::getDf();
        $percent=round(($df['df']-0)/($df['dt']-0)*100,2);
        $used=$df['dt']-$df['df'];
        $info="总磁盘空间: <span id='system-df-total'>{$df['dt']}</span>&nbsp;<span id='system-df-total-unit'>GB</span>&nbsp;&nbsp;
                        <a href=\"#\" title=\"显示的是网站所在的目录的可用空间，非服务器上所有磁盘之可用空间！\">可用空间: </a>
                        <span id='system-df-free'>{$df['df']}</span>&nbsp;<span id='system-df-free-unit'>GB</span> 已使用：
                        <span id='system-df-used'>{$used}</span> <span id='system-df-used-unit'>GB</span>";
        return '<div class=\'system-df\' id="system-df">'.$info.$this->renderProcess($df['dt'],$used,0,$this->dfOption,$this->dfBarOption).'</div>';
    }
}