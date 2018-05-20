<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = yii::t('app',$name);
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p>
        Url:<?=\yii::$app->request->getUrl();?>
    </p>
    <p>
        <?=\yii::t('app','The above error occurred while the Web server was processing your request.')?>
    </p>
    <p>
        <?=\yii::t('app','Please contact us if you think this is a server error. Thank you.')?>
    </p>
</div>
