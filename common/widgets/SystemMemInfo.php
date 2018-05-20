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

class SystemMemInfo extends SystemInfo
{

    public $memOption=[];
    public $memBarOption=[];


    public function run()
    {
        echo $this->renderMem();
    }

    public function renderMem(){
        if( $mem=System::getMem() ){
            $mem_used=$mem['MemTotal']['value']-$mem['MemFree']['value'];
            $mem_info="<a href=\"#\" title=\"{$mem['MemTotal']['explain']}\">总内存: </a>
                 <span id='system-mem-total'>{$mem['MemTotal']['value']}</span>&nbsp;<span id='system-mem-total-unit'>{$mem['MemTotal']['unit']}</span>&nbsp;&nbsp;
                <a href=\"#\" title=\"{$mem['MemFree']['explain']}\">空闲内存: </a>
                <span id='system-mem-free'>{$mem['MemFree']['value']}</span>&nbsp;<span id='system-mem-free-unit'>{$mem['MemFree']['unit']}</span>
                  <a href=\"#\" title=\"{$mem['MemAvailable']['explain']}\">可用内存: </a>
                  <span id='system-mem-available'>{$mem['MemAvailable']['value']}</span>&nbsp;<span id='system-mem-available-unit'>{$mem['MemAvailable']['unit']}</span>";
            $mem_elem='<div class=\'system-mem\' id="system-mem">'.$mem_info.$this->renderProcess($mem['MemTotal']['value'],$mem_used,0,$this->memOption,$this->memBarOption).'</div>';

            $mem_used_real=$mem['MemTotal']['value']-$mem['MemAvailable']['value'];
            $mem_real="<a href=\"#\" title=\"{$mem['MemAvailable']['explain']}\">真实已用: </a>
                 <span id='system-mem-real-used'>{$mem_used_real}</span>&nbsp;<span id='system-mem-real-used-unit'>{$mem['MemAvailable']['unit']}</span>
                 <a href=\"#\" title=\"{$mem['MemAvailable']['explain']}\">真实可用: </a>
                 <span id='system-mem-real-available'>{$mem['MemAvailable']['value']}</span>&nbsp;<span id='system-mem-real-available-unit'>{$mem['MemAvailable']['unit']}</span>";
            $mem_real_elem='<div class=\'system-mem\' id="system-mem-real">'.$mem_real.$this->renderProcess($mem['MemTotal']['value'],$mem_used_real,0,$this->memOption,$this->memBarOption).'</div>';


            $swap_used=$mem['SwapTotal']['value']-$mem['SwapFree']['value'];
            $swap_info="<a href=\"#\" title=\"{$mem['SwapTotal']['explain']}\">Swap交换空间: </a>
                    <span id='system-swap-total'>{$mem['SwapTotal']['value']}</span>&nbsp;<span id='system-swap-total-unit'>{$mem['SwapTotal']['unit']}</span>&nbsp;&nbsp;
                    <a href=\"#\" title=\"{$mem['SwapFree']['explain']}\">Swap空闲内存: </a>
                    <span id='system-swap-free'>{$mem['SwapFree']['value']}</span>&nbsp;<span id='system-swap-free-unit'>{$mem['SwapFree']['unit']}</span>
                    <a href=\"#\" title=\"{$mem['SwapFree']['explain']}\">Swap已经使用: </a>
                    <span id='system-swap-used'>{$swap_used}</span>&nbsp;";
            $swap_elem='<div class=\'system-swap\' id="system-swap">'.$swap_info.$this->renderProcess($mem['SwapTotal']['value'],$swap_used,0,$this->memOption,$this->memBarOption).'</div>';

            $buffer_info="<a href=\"#\" title=\"{$mem['Cached']['explain']}\">Cache缓存: </a>
                        <span id='system-cached-used' >{$mem['Cached']['value']}</span>&nbsp;<span id='system-cached-used-unit'>{$mem['Cached']['unit']}</span>&nbsp;&nbsp;
                        <a href=\"#\" title=\"{$mem['Buffers']['explain']}\">Buffers缓存: </a>
                        <span id='system-buffers'>{$mem['Buffers']['value']}</span>&nbsp;<span id='system-buffers-unit'>{$mem['Buffers']['unit']}</span>";
            $buffer_elem='<div class=\'system-cached\' id="system-cached">'.$buffer_info.$this->renderProcess($mem['MemTotal']['value'],$mem['Cached']['value'],0,$this->memOption,$this->memBarOption).'</div>';

            $vmem_info="<a href=\"#\" title=\"{$mem['VmallocTotal']['explain']}\">虚拟内存: </a>
                        <span id='system-vmem-total'>{$mem['VmallocTotal']['value']}</span>&nbsp;<span id='system-vmem-total-unit'>{$mem['VmallocTotal']['unit']}</span>&nbsp;&nbsp;
                        <a href=\"#\" title=\"{$mem['VmallocUsed']['explain']}\">虚拟内存已使用: </a>
                        <span id='system-vmem-used'>{$mem['VmallocUsed']['value']}</span>&nbsp;<span id='system-vmem-total-used-unit'>{$mem['VmallocUsed']['unit']}</span>";
            $vmem_elem='<div class=\'system-vmem\' id="system-vmem">'.$vmem_info.$this->renderProcess($mem['VmallocTotal']['value'],$mem['VmallocUsed']['value'],0,$this->memOption,$this->memBarOption).'</div>';

            return $mem_elem.$mem_real_elem.$buffer_elem.$swap_elem.$vmem_elem;
        }else{
            return '';
        }
    }

}