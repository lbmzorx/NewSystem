<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\user\User */
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p><?=\yii::t('app','Follow the link below to reset your password:')?></p>

    <p><?= Html::a(Html::encode($link), $link) ?></p>
    <p>
        <strong><?=\yii::t('app','Attention this link will be invalid at {date}!',['date'=>\yii::$app->formatter->format($expire,'datetime')])?></strong>
    </p>
</div>
