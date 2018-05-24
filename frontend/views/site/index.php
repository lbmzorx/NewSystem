<?php

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">

        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 " id="side-box">
            <?=\frontend\widget\ArticleCateWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'article-box'
                ],

            ])?>
            <?=\frontend\widget\TagWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'tag-box'
                ],
            ])?>
        </div>
    </div>


</div>
