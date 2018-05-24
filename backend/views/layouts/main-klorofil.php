<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
\backend\assets\KlorofilAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="fullscreen-bg">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top" id="nav-top">
        <div class="brand" style="padding: 15px 39px">
            <a href="<?=\yii\helpers\Url::to(['/'])?>"><img src="/img/logo-small-x.png" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                </div>
            </form>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="lnr lnr-alarm"></i>
                            <span class="badge bg-danger">5</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                            <li><a href="#" class="more">See all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Basic Use</a></li>
                            <li><a href="#">Working With Data</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Troubleshooting</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=\yii::$app->getUser()->identity->head_img?>" class="img-circle" alt="<?=\yii::$app->getUser()->identity->username?>"> <span><?=\yii::$app->getUser()->identity->username?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/default/index'])?>"><i class="lnr lnr-user"></i><span><?=\yii::t('app','My Profile')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/admin-message/index'])?>"><i class="lnr lnr-envelope"></i> <span><?=\yii::t('app','Message')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/message/index'])?>"><i class="lnr lnr-cog"></i> <span><?=\yii::t('app','Settings')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>"><i class="lnr lnr-exit"></i> <span><?=\yii::t('app','Logout')?></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <?=\backend\widget\MenuKlorofil::widget([
                        'top'=>isset($this->params['top'])?$this->params['top']:'0',
                        'left'=>isset($this->params['left'])?$this->params['left']:\Yii::$app->controller->module->id,
                        'leftsub'=>isset($this->params['leftsub'])?$this->params['leftsub']:\Yii::$app->controller->id,
                        'leftleftsub'=>isset($this->params['leftleftsub'])?$this->params['leftleftsub']:\Yii::$app->controller->action->id,
                    ])?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
</div>
<!-- END WRAPPER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
