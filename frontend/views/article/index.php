<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = Html::encode(isset(\yii::$app->params['website_title'])?\yii::$app->params['website_title']:\yii::t('app','Article'));
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => isset(\yii::$app->params['seo_keywords'])?\yii::$app->params['seo_keywords']:'',
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => isset(\yii::$app->params['seo_description'])?\yii::$app->params['seo_description']:'',
]);
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <?=yii\widgets\ListView::widget([
                'dataProvider'=>$provider,
                'itemOptions' => ['class' => 'item list-group-item','tag'=>'li'],
                'layout'=>"<ul class='list-group'>{items}</ul>\n{summary}\n{pager}",
                'itemView' => function ($model, $key, $index, $widget) {
                    /**
                     * @var $model \yii\base\Model;
                     */

                    $url=\yii\helpers\Url::to(['article/view','id'=>$model->id]);
                    $userUrl=\yii\helpers\Url::to(['user/index','id'=>$model->user['id']]);
                    $date=date("Y-m-d",$model->add_time);

                    $collection=$model->getAttributeLabel('collection');
                    $thumbup=$model->getAttributeLabel('thumbup');
                    $commit=$model->getAttributeLabel('commit');
                    $view=$model->getAttributeLabel('view');

                    $right='';
                    if($model->cover){
                        $right=Html::tag('div',Html::a(Html::img($model->cover,['style'=>'max-width:100px;max-height:100px;']),['article/view','id'=>$model->id]),['class'=>'media-right']);
                    }

                    $str=<<<DOM
<div class="media-left"> 
<a href="{$userUrl}" rel="author"> 
<img class="media-object" src="{$model->user['head_img']}" alt="{$model->user['username']}">
</a>
</div>
<div class="media-body">
    <h1 class="media-heading">
    <a href="{$url}">{$model->title}</a>
    </h1>
    <div class="media-action">
    <span class="info-article" title=""><a href="$userUrl" rel="author">{$model->user['username']}</a></span>
    <span class="info-article" title=""><i class="fa fa-calendar"></i> {$date}</span>
    <span class="info-article" title="{$view}"><i class="fa fa-eye"></i> {$model->view}</span>
    <span class="info-article" title="{$thumbup}"><i class="fa fa-thumbs-o-up"></i> {$model->thumbup}</span>
    <span class="info-article" title="{$collection}"><i class="fa fa-folder"></i> {$model->collection}</span>
    <span class="info-article" title="{$commit}"><i class="fa fa-commenting "></i> {$model->commit}</span>
    </div>
</div>
{$right}
DOM;
                    return $str;//Html::a( Html::encode($model->title), ['view', 'id' => $model->id]);
                },
            ])?>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 " id="side-box">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a class="btn btn-success btn-all" href="<?=\yii\helpers\Url::to(['article/create'])?>"><i class="fa fa-plus"></i>&nbsp; <?=\yii::t('app','Create New Article')?></a>
                </div>
            </div>
            <?=\frontend\widget\ArticleCateWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'article-box'
                ],

            ])?>
            <?=\frontend\widget\TagWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'tag-box'
                ],
            ])?>
        </div>
    </div>
</div>
