<?php
/**
 * Created by Administrator.
 * Date: 2018/6/3 2:05
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Url;

$pagination=new \yii\data\Pagination(['totalCount'=>100]);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>测试</title>
    <link rel="stylesheet" href="/assets/layui-v2.3.0/layui-v2.3.0/layui/css/layui.css">
</head>
<body>
<div>
    <p>
        <button id="time" >时间</button>
    </p>

    <p>
        url to
        <a href="<?=Url::to(['site/index','a'=>'b'])?>">site/index</a>
    </p>
    <p>
        page直接创建
        <button>page-creat2 <?=$pagination->createUrl(1)?></button>
    </p>
    <p>
        url to 有参数
        <a href="<?=Url::to(['site/index','a'=>'b','d'=>'b'])?>">site/index</a>
    </p>
    <p>
        html a 数组有参数
        <?=\yii\helpers\Html::a('testhtmla',['site/index','page'=>1])?>
    </p>
    <p>
        html a page创建url
        <?=\yii\helpers\Html::a('testhtmla-create-link-1',$pagination->createUrl(1))?>
    </p>
    <p>
        <?=\yii\widgets\LinkPager::widget([
            'pagination'=>$pagination,
        ])?>
    </p>

</div>
<script type="text/javascript" src="/assets/layui-v2.3.0/layui-v2.3.0/layui/layui.js"></script>
<script type="text/javascript" src="/assets/layer-v3.1.1/layer-v3.1.1/layer/layer.js"></script>
</body>
</html>

