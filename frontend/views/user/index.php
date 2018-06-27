<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 22:02
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Html;
$user=\yii::$app->request->get('id')?:\yii::$app->user->id;
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <?=\frontend\widget\UserCardWidget::widget([
                'userId'=>$user,
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'user-info-box'
                ],
            ])?>
            <?=yii\widgets\ListView::widget([
                'dataProvider'=>$provider,
                'itemOptions' => ['class' => 'item list-group-item','tag'=>'li'],
                'layout'=>"<ul class='list-group'>{items}</ul>\n{summary}\n{pager}",
                'itemView' => function ($model, $key, $index, $widget) use ($user)  {
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
                    $edit='';
                    $status='';
                    if(\yii::$app->user->id==$user) {
                        $status = Html::tag('span', $model->getStatusCode('status', 'status_code'),
                            ['class' => 'pull-right label label-' . $model->getStatusCss('status', 'status_css', $model->status)]);
                        if((time()-$model->add_time)<86400*3){
                            $edit=Html::a(Html::tag('i','',['class'=>'fa fa-pencil-square-o']).\yii::t('app','Update'),
                                ['/article/update','id'=>$model->id],
                                ['title'=>\yii::t('app','Update')]
                            );
                        }
                    }
                    $str=<<<DOM
<div class="media-left"> 
<a href="{$userUrl}" rel="author"> 
<img class="media-object" src="{$model->user['head_img']}" alt="{$model->user['username']}" onerror="this.src='/img/logo-50.png'">
</a>
</div>
<div class="media-body">
    <h3 class="media-heading">
    <a href="{$url}">{$model->title}</a>
    </h3>
    <div class="media-action">
    {$status}
    {$edit}
    <span class="info-article" title=""><a href="$userUrl" rel="author">{$model->user['username']}</a></span>
    <span class="info-article" title="{$model->tag}"><i class="fa fa-tag "></i> {$model->tag}</span>
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