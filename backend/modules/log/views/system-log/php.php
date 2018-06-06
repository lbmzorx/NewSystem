<?php
/**
 * Created by Administrator.
 * Date: 2018/6/6 20:29
 * github: https://github.com/lbmzorx
 */

use yii\helpers\Url;

$pagination=new \yii\data\Pagination(['totalCount'=>100]);

?>

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