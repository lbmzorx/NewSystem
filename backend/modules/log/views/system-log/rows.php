<?php
/**
 * Created by aa.
 * User: aa
 * Date: 2018/6/12 9:36
 * Email: @foxdou.com
 */
use yii\helpers\Html;

$request=\yii::$app->request;
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="panel">
    <div class="panel-head">
        <h5>日志-<?=$this->title?>
            <small>全部</small>
        </h5>
    </div>
    <div class="panel-body">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <?php  $j=0;foreach ($filelist as $k=>$v):$j++?>
                    <li class="<?=($request->get('filename')==$k)||($request->get('filename')=='' && $j==1)?'active':''?>">
                        <a href="<?=\yii\helpers\Url::to(['','filename'=>$k])?>"><?=$k?></a></li>
                <?php endforeach;?>
            </ul>
            <div class="tab-content m-b">
            </div>
        </div>
        <div class="seach">
            <div class="panel">
                <div class="panel-body">
                    <?= Html::beginForm(['',], 'get',['id'=>'search-form']) ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">行</span>
                                <input name="num" value="" placeholder="显示行数" class="form-control"/>
                                <span class="input-group-btn"> <?= Html::submitButton('设置', ['class' => 'btn btn-success']) ?></span>
                            </div>
                        </div>
                    </div>

                    <?= Html::endForm() ?>
                </div>
            </div>
        </div>
        <p >
            <?php foreach ($filelist as $k=>$v):?>
                <a class="btn btn-primary btn-sm" href="<?=\yii\helpers\Url::to(['download','filename'=>$k,'filepath'=>$filepath])?>" target="_blank"
                   title="超过10M文件只下载其中的后1000条记录">下载<?=$k?> <?=$v['size']?></a>
            <?php endforeach;?>
        </p>
        <div >
            <?php if($content):?>
                <?php foreach ($content as $k=>$v):?>
                    <pre><?=$k?>: <?=$v?></pre>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
