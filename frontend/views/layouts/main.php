<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?=$this->registerCss(<<<STYLE
        #msg-count{
            position:absolute;
            top:-7px;
            left:9px;
            border:2px solid;
            padding:2px 3px;
            background-color:#F9354C;
        }
STYLE
)?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="my-site">
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' =>  \yii::t('app','Home'), 'url' => ['/article/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' =>  \yii::t('app','Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' =>  \yii::t('app','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] =[
            'label'=>Html::tag(
                'span',
                Html::tag('span',isset($message)?$message:'13',['class'=>'badge bg-danger','id'=>'msg-count']),
                ['class'=>'glyphicon glyphicon-bell']
            ),
            'encode'=>false,
            'url'=>['/user/message'],

        ];

        $menuItems[] =[
            'label' => Yii::$app->user->identity->username,
            'encode'=>false,
            'items' => [
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-user']).' 个人主页','encode'=>false, 'url' => ['/user/']],
                ['label'=>'','options'=>['class'=>['widget'=>'divider']]],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-cog']).' 账户设置','encode'=>false, 'url' => ['/speak/index']],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-at']).' 与我相关','encode'=>false, 'url' => ['/speak/index']],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-list-ol']).' 我的发布','encode'=>false, 'url' => ['/speak/index']],
                ['label'=>'','options'=>['class'=>['widget'=>'divider']]],
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    Html::tag('i','',['class'=>'fa fa-fw fa-power-off']).' 退出',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
//                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-power-off']).' 退出','encode'=>false, 'url' => ['/site/logout']],
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php  if (! Yii::$app->user->isGuest) :?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php endif;?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer bg-info" id="footer">
    <div class="container">
        <div class="clearfix">
            <span class="pull-left">Copyright © 2009-2017 by <a href="<?=Url::to(['/site/about'])?>">重楼空间</a>.</span>
            <span class="pull-left" style="margin-left: 10px;"><a href="<?=Url::to(['/site/contact'])?>"><?=\yii::t('app','Contact Us')?></a></span>
            <span class="pull-right hidden-xs hidden-sm">
                <a href="http://www.miibeian.gov.cn" target="_blank"><?=\yii::$app->params['website_icp']?></a>
            </span>
        </div>
    </div>
</footer>
<?php $this->registerJs('$("#user-head-nav").error(function(){$(this).attr(\'src\',\'/img/user/default-head.png\')})')?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
