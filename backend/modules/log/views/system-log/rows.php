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
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>日志-<?=$this->title?>
                    <small>全部</small>
                </h5>
            </div>
            <div class="ibox-content">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <?php foreach ($filelist as $k=>$v):?>
                            <li class="<?=($request->get('filename')==$k)||($request->get('filename')=='' && $k==0)?'active':''?>">
                                <a href="<?=\yii\helpers\Url::to(['','filename'=>$k])?>"><?=$v?></a></li>
                        <?php endforeach;?>
                    </ul>
                    <div class="tab-content m-b">
                    </div>
                </div>
                <div class="seach">
                    <?= Html::beginForm(['',], 'get',['id'=>'search-form']) ?>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="input-group m-b"><span class="input-group-addon">行</span>
                                <input name="num" value="" placeholder="显示行数" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
                    <?= Html::endForm() ?>
                </div>
                <div >
                    <?php foreach ($filelist as $k=>$v):?>
                        <a class="btn btn-primary btn-sm" href="<?=\yii\helpers\Url::to(['nginx-download-log','filename'=>$k,])?>" target="_blank"
                           title="超过10M文件只下载其中的后1000条记录">下载<?=$v?> <?=$v['size']?></a>
                    <?php endforeach;?>
                </div>
                <div >
                    <?php if($content):?>
                        <?php foreach ($content as $k=>$v):?>
                            <pre><?=$k?>: <?=$v?></pre>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
