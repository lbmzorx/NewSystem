<?php
/**
 * Created by Administrator.
 * Date: 2018/6/25 19:53
 * github: https://github.com/lbmzorx
 */
\common\assets\XinlangAsset::register($this);
$actionid=\yii::$app->controller->action->id;
if($actionid=='index'){
    $share='我发现了一个阅读的好去处，大家一起来围观吧！';
}else{
    $share='我在'.(isset(\yii::$app->params['website_title'])?\yii::$app->params['website_title']:'重楼空间').'发现好文'.$this->title;
}
?>

<wb:share-button appkey="<?=isset(\yii::$app->params['weibo_share_appKey'])?\yii::$app->params['weibo_share_appKey']:''?>"
                 addition="<?=isset(\yii::$app->params['weibo_share_addition'])?\yii::$app->params['weibo_share_addition']:'number'?>"
                 type="<?=isset(\yii::$app->params['weibo_share_type'])?\yii::$app->params['weibo_share_type']:'button'?>"
                 <?=isset(\yii::$app->params['weibo_share_ralateUid'])?'ralateUid="'.\yii::$app->params['weibo_share_ralateUid'].'"':''?>
                 default_text="<?=urlencode($share)?>"
                 language="zh_cn"></wb:share-button>
