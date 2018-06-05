<?php
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>系统错误</h5>
                        <div class="ibox-tools">
                            <span class="label label-warning-light"></span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>系统今日请求错误记录：<a href="<?=Url::to(['/log/yii-log/index'])?>" target="_top" class="btn btn-warning"><?=$yiilogCount?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>服务器系统运行-磁盘 </h5>
                    </div>
                    <div class="ibox-tools">
                        <a class="collapse-link ui-sortable" title="详情.." href="<?=Url::to(['/system','right_url'=>Url::to(['/system/web-admin/pointer'])])?>">
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="index.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                    <div class="ibox-content">
                        <?=\common\widgets\SystemDfInfo::widget([
                            'dfBarOption'=>[
                                'aria-color'=>210,
                            ],
                        ])?>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>服务器系统运行-CPU</h5>
                    </div>
                    <div class="ibox-content">
                        <?=\common\widgets\SystemCpuInfo::widget([
                            'cpuBarOption'=>[
                                'aria-color'=>210,
                            ],
                        ])?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>服务器系统运行-内存</h5>
                    </div>
                    <div class="ibox-content">
                        <?=\common\widgets\SystemMemInfo::widget([
                            'memBarOption'=>[
                                'aria-color'=>210,
                            ],
                        ])?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php \lbmzorx\components\widget\JsBlock::begin(['pos'=>\yii\web\View::POS_END]);?>
<script type="text/javascript">

    function getSystemData()
    {
        setTimeout("getSystemData()", 1000);
        $.getJSON('?act=rt&sdfsafds=asdfas',{}, displayData);
    }
    getSystemData();
    function displayData(dataJSON)
    {
        $("#system-df-total").html(dataJSON.df.dtTotal);
        $("#system-df-free").html(dataJSON.df.dfFree);
        $("#system-df-used").html(dataJSON.df.dfUsed);

        var dfdom=$('#system-df').find('.progress-bar');
        var dfcolor=dfdom.attr('aria-color');
        dfdom.text(dataJSON.df.dfPercent+'%');
        dfdom.attr('aria-valuenow',dataJSON.df.dfUsed);
        dfdom.attr('aria-valuemax',dataJSON.df.dtTotal);
        dfdom.css('width',dataJSON.df.dfPercent+'%');
        dfdom.css('background-color',coloMode(dfcolor,dataJSON.df.dfPercent));

        $("#system-mem-total").html(dataJSON.MemTotal);
        $("#system-mem-free").html(dataJSON.MemFree);
        $('#system-mem-real-available').html(dataJSON.MemAvailable);
        $('#system-mem-real-used').html(dataJSON.MemRealUsed);
        $("#system-mem-available").html(dataJSON.MemAvailable);
        $("#system-swap-total").html(dataJSON.SwapTotal);
        $("#system-swap-free").html(dataJSON.SwapFree);
        $("#system-swap-used").html(dataJSON.SwapUsed);
        $("#system-cached-used").html(dataJSON.Cached);
        $("#system-buffers").html(dataJSON.Buffers);
        $("#system-vmem-total").html(dataJSON.VmallocTotal);
        $("#system-vmem-used").html(dataJSON.VmallocUsed);

        $("#system-mem-total-unit").html(dataJSON.MemTotal_unit);
        $("#system-mem-free-unit").html(dataJSON.MemFree_unit);
        $('#system-mem-real-available-unit').html(dataJSON.MemAvailable_unit);
        $('#system-mem-real-used-unit').html(dataJSON.MemRealUsed_unit);
        $("#system-mem-available-unit").html(dataJSON.MemAvailable_unit);
        $("#system-swap-total-unit").html(dataJSON.SwapTotal_unit);
        $("#system-swap-free-unit").html(dataJSON.SwapFree_unit);
        $("#system-swap-used-unit").html(dataJSON.SwapUsed_unit);
        $("#system-cached-used-unit").html(dataJSON.Cached_unit);
        $("#system-buffers-unit").html(dataJSON.Buffers_unit);
        $("#system-vmem-total-unit").html(dataJSON.VmallocTotal_unit);
        $("#system-vmem-used-unit").html(dataJSON.VmallocUsed_unit);


        var memdom=$('#system-mem').find('.progress-bar');
        var memcolor=memdom.attr('aria-color');
        memdom.text(dataJSON.MemPercent+'%');
        memdom.attr('aria-valuenow',dataJSON.MemUsed);
        memdom.attr('aria-valuemax',dataJSON.MemTotal);
        memdom.css('width',dataJSON.MemPercent+'%');
        memdom.css('background-color',coloMode(memcolor,dataJSON.MemPercent));

        var memrealdom=$('#system-mem-real').find('.progress-bar');
        var memrealcolor=memrealdom.attr('aria-color');
        memrealdom.text(dataJSON.MemRealPercent+'%');
        memrealdom.attr('aria-valuenow',dataJSON.MemRealUsed);
        memrealdom.attr('aria-valuemax',dataJSON.MemTotal);
        memrealdom.css('width',dataJSON.MemRealPercent+'%');
        memrealdom.css('background-color',coloMode(memrealcolor,dataJSON.MemRealPercent));


        var swapdom=$('#system-swap').find('.progress-bar');
        var swapcolor=swapdom.attr('aria-color');
        swapdom.text(dataJSON.SwapPercent+'%');
        swapdom.attr('aria-valuenow',dataJSON.SwapUsed);
        swapdom.attr('aria-valuemax',dataJSON.SwapTotal);
        swapdom.css('width',dataJSON.SwapPercent+'%');
        swapdom.css('background-color',coloMode(swapcolor,dataJSON.SwapPercent));

        var cachedom=$('#system-cached').find('.progress-bar');
        var cachecolor=cachedom.attr('aria-color');
        cachedom.text(dataJSON.CachedPercent+'%');
        cachedom.attr('aria-valuenow',dataJSON.Cached);
        cachedom.attr('aria-valuemax',dataJSON.MemTotal);
        cachedom.css('width',dataJSON.CachedPercent+'%');
        cachedom.css('background-color',coloMode(cachecolor,dataJSON.CachedPercent));

        var vmemdom=$('#system-vmem').find('.progress-bar');
        var vmemcolor=vmemdom.attr('aria-color');
        vmemdom.text(dataJSON.VmallocPercent+'%');
        vmemdom.attr('aria-valuenow',dataJSON.VmallocUsed);
        vmemdom.attr('aria-valuemax',dataJSON.VmallocTotal);
        vmemdom.css('width',dataJSON.VmallocPercent+'%');
        vmemdom.css('background-color',coloMode(swapcolor,dataJSON.VmallocPercent));

        $("#system-cpu-processes").html(dataJSON.processes);
        $("#system-cpu-procs_running").html(dataJSON.procs_running);
        $("#system-cpu-procs_blocked").html(dataJSON.procs_blocked);

        $.each(dataJSON.cpu,function (k,v) {
            $("#system-cpu-sys-"+v).html(dataJSON[v].sys);
            $("#system-cpu-nice-"+v).html(dataJSON[v].nice);
            $("#system-cpu-idle-"+v).html(dataJSON[v].idle);
            $("#system-cpu-iowait-"+v).html(dataJSON[v].iowait);
            $("#system-cpu-irq-"+v).html(dataJSON[v].irq);
            $("#system-cpu-softirq-"+v).html(dataJSON[v].softirq);
            var cpudom=$('#system-cpu-'+v).find('.progress-bar');
            var cpudomcolor=cpudom.attr('aria-color');
            cpudom.text(dataJSON[v].sys+'%');
            cpudom.attr('aria-valuenow',dataJSON[v].sys);
            cpudom.attr('aria-valuemax',100);
            cpudom.css('width',dataJSON[v].sys+'%');
            cpudom.css('background-color',coloMode(cpudomcolor,dataJSON[v].sys));
        });
    }

    function coloMode(colormode,percent) {
        percent=parseInt(percent);
        var r,g,b,rgb;
        r=parseInt(255*percent/100);
        g=parseInt(255-255*percent/100);
        b=80;
        switch (colormode){
            case '210':       //由绿变红(0,255,80) -> (255,0,80)
                rgb= '('+r+','+g+','+b+')';
                break;
            case '120':        //由红变绿(0+','+255+','+80) -> (255+','+0+','+80)
                rgb=  '('+g+','+r+','+b+')';
                break;
            case '201':       //由蓝变红(0+','+80+','+255) -> (255+','+80+','+0)
                rgb=  '('+r+','+b+','+g+')';
                break;
            case '102':       //由红变蓝(255+','+80+','+0) -> (0+','+80+','+255)
                rgb=  '('+g+','+b+','+r+')';
                break;
            case '021':        //由蓝变绿(80+','+0+','+255) -> (80+','+255+','+0)
                rgb=  '('+b+','+r+','+g+')';
                break;
            case '012':        //由绿变蓝(80+','+255+','+0) -> (80+','+0+','+255)
                rgb=  '('+b+','+g+','+r+')';
                break;
            default:        //由绿变红(0+','+255+','+80) -> (255+','+0+','+80)
                rgb=  '('+r+','+g+','+b+')';
                break;
        }
        return rgb;
    }
</script>
<?php \lbmzorx\components\widget\JsBlock::end();?>
