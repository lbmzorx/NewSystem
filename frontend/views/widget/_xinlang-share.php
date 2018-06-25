<?php
/**
 * Created by Administrator.
 * Date: 2018/6/25 19:53
 * github: https://github.com/lbmzorx
 */
\common\assets\XinlangAsset::register($this);
?>

<wb:share-button appkey="<?=isset(\yii::$app->params['weibo_share_appKey'])?\yii::$app->params['weibo_share_appKey']:''?>" addition="number" type="button"></wb:share-button>
