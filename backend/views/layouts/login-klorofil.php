<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
\backend\assets\KlorofilLoginAsset::register($this);
?>
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
<body>
<!-- WRAPPER -->
<?php $this->beginBody() ?>
<?=$content?>
<?= $this->render('//widgets/_flash') ?>
<!-- END WRAPPER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
