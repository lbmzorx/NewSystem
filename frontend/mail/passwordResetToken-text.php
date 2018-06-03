<?php

/* @var $this yii\web\View */
/* @var $user common\models\user\User */

?>
Hello <?= $user->username ?>,

<?=\yii::t('app','Follow the link below to reset your password:')?>

<?= $link ?>

<?=\yii::t('app','Attention this link will be invalid at {date}!',['date'=>\yii::$app->formatter->format($expire,'datetime')])?>
