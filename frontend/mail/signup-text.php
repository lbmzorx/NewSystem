<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\user\User */
/* $var $link */
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p><?=\yii::t('app','Follow the link below to activate your account:')?></p>
    <p>
        <a href="<?= $link ?>"><?= $link ?></a>
    </p>
</div>
<p>
    <?=\yii::$app->name?>
</p>
