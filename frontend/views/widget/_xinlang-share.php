<?php
/**
 * Created by Administrator.
 * Date: 2018/6/25 19:53
 * github: https://github.com/lbmzorx
 */
\common\assets\XinlangAsset::register($this);
?>

<wb:share-button appkey="<?=isset(\yii::$app->params['weibo_share_appKey'])?\yii::$app->params['weibo_share_appKey']:''?>"
                 addition="<?=isset(\yii::$app->params['weibo_share_addition'])?\yii::$app->params['weibo_share_addition']:'number'?>"
                 type="<?=isset(\yii::$app->params['weibo_share_type'])?\yii::$app->params['weibo_share_type']:'button'?>"
                 <?=isset(\yii::$app->params['weibo_share_ralateUid'])?'ralateUid="'.\yii::$app->params['weibo_share_ralateUid'].'"':''?>
                 language="zh_cn"></wb:share-button>
