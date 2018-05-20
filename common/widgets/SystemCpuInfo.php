<?php
/**
 * Created for advanced-admin.
 * User: aa
 * Date: 2018/4/10 10:13
 */
namespace common\widgets;

use common\components\tools\System;
class SystemCpuInfo extends SystemInfo
{
    public $cpuOption=[];
    public $cpuBarOption=[];

    public function run()
    {
        echo $this->renderCpu();
    }

    public function renderCpu(){
        $cpus=System::getCPU();
        if($cpus ==false){
            return false;
        }
        $process=System::$process;
        $cpu_dom="<p><a href=\"#\" title=\"系统启动以来所创建的任务的个数目\">累积任务数: </a>
                 <span id='system-cpu-processes'>{$process['processes']}</span>&nbsp;
                    <a href=\"#\" title=\"当前运行队列的任务的数目\">当前任务: </a>
                 <span id='system-cpu-procs_running'>{$process['procs_running']}</span>&nbsp;
                 <a href=\"#\" title=\"当前被阻塞的任务的数目\">阻塞任务: </a>
                 <span id='system-cpu-procs_blocked'>{$process['procs_blocked']}</span>&nbsp;</p>";
        if(is_array($cpus)){
            foreach ($cpus as $k=>$cpu){
                $cpu_info="CPU {$k}:<span id='system-cpu-sys-{$k}'>{$cpu['sys']}</span>&nbsp;%us&nbsp;&nbsp;
                    <span id='system-cpu-nice-{$k}'>{$cpu['nice']}</span>&nbsp;%ni&nbsp;&nbsp;
                    <span id='system-cpu-idle-{$k}'>{$cpu['idle']}</span>&nbsp;%id&nbsp;&nbsp;
                    <span id='system-cpu-iowait-{$k}'>{$cpu['iowait']}</span>&nbsp;%wa&nbsp;&nbsp;
                    <span id='system-cpu-irq-{$k}'>{$cpu['irq']}</span>&nbsp;%irq&nbsp;&nbsp;            
                    <span id='system-cpu-softirq-{$k}'>{$cpu['softirq']}</span>&nbsp;%softirq&nbsp;&nbsp;";
                $cpu_elem="<div class=\"system-cpu\" id=\"system-cpu-{$k}\">".$cpu_info.$this->renderProcess(100,$cpu['sys'],0,$this->cpuOption,$this->cpuBarOption).'</div>';
                $cpu_dom.=$cpu_elem;
            }
        }

        return $cpu_dom;
    }
}