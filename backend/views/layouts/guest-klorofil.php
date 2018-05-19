<?php
\backend\assets\KlorofilBadRequestAsset::register($this);
?>
<?=$this->beginPage()?>
<!doctype html>
<html lang="en">
<head>
    <title><?=\yii\helpers\Html::encode($this->title)?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?= \yii\helpers\Html::csrfMetaTags() ?>
    <?=$this->head()?>
</head>
<body>
<?=$this->beginBody()?>
<div id="wrapper">
    <?= $content ?>
    <footer style="right: 50%">
        <div class="text-center">
            <p class="copyright">&copy; 2017 重楼</p>
        </div>
    </footer>
</div>
<!-- Javascript -->
<?= $this->render('//widgets/_flash') ?>
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
