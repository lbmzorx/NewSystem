<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <div class="thumbnail text-center">
                    <button class="btn btn-success" id="clear-cache">清理缓存</button>
                    <div class="caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <div class="thumbnail text-center">
                    <button class="btn btn-success" id="clear-cache-schame">清理数据库缓存</button>
                    <div class="caption">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php \lbmzorx\components\widget\JsBlock::begin()?>
<script type="text/javascript">
    var layer;
    layui.use(['layer'],function () {
        layer=layui.layer;
    });

    $('#clear-cache').click(function () {
        $.ajax({
            url:'<?=\yii\helpers\Url::to(['clear-cache-frontend'])?>',
            type:'get',
            success:function (res) {
                if(res.status){
                    layer.msg(res.msg);
                }else{
                    layer.msg(res.msg);
                }
            },
            error:function (res) {
                layer.alert('清理失败');
            }
        })
    });
    $('#clear-cache-schame').click(function () {
        $.ajax({
            url:'<?=\yii\helpers\Url::to(['clear-schame-frontend'])?>',
            type:'get',
            success:function (res) {
                if(res.status){
                    layer.msg(res.msg);
                }else{
                    layer.msg(res.msg);
                }
            },
            error:function (res) {
                layer.alert('清理失败');
            }
        })
    });
</script>
<?php \lbmzorx\components\widget\JsBlock::end()?>
