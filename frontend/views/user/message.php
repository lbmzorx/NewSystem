<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 22:02
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Html;

$item=[];
$item[]=[
    'label'=>\yii::t('app','All'),
    'url'=>['/user/message'],
];
foreach (\common\models\startdata\UserMessage::$message_type_code as $k=>$v){
    $item[]=[
        'label'=>\yii::t('statuscode',$v),
        'url'=>['/user/message','type'=>$k],
    ];
}

$this->registerCss(<<<style
.list-view .list-group{border-top:none;}
.list-view .list-group-item{border:none;}
.media-heading {margin:10px 0;}
style
);

?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <?=\frontend\widget\UserCardWidget::widget([
                'userId'=>\yii::$app->user->id,
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'user-info-box'
                ],
            ])?>


            <?= \yii\bootstrap\Nav::widget([
                'items'=>$item,
                'options'=>['class'=>'nav nav-tabs'],
            ])?>

            <?=yii\widgets\ListView::widget([
                'dataProvider'=>$provider,
                'itemOptions' => ['class' => 'item list-group-item','tag'=>'li'],
                'layout'=>"<ul class='list-group'>{items}</ul>\n{summary}\n{pager}",
                'itemView' => function ($model, $key, $index, $widget) {
                    /**
                     * @var $model \yii\base\Model;
                     */

                    $url=\yii\helpers\Url::to(['article/view','id'=>$model->id]);
                    $userUrl=\yii\helpers\Url::to(['user/index','id'=>\yii::$app->user->id]);
                    $date=date("Y-m-d",$model->add_time);
                    $view='';

                    $read=Html::tag('lable',$model->getStatusCode('read','read_code'),['class'=>$model->read?'label label-info':'label label-danger']);
                    if($model->is_link){
                        $view=Html::a(\yii::t('app','View'),$model->link,['data-id'=>$model->id,'class'=>'message-type-read']);
                    }

                    $right='';

                    $str=<<<DOM
<div class="media-body">
    <span class="" title="">{$date}</span>
    <h3 class="media-heading">
        {$model->content}
    </h3>
    <div class="media-action">
    <span class="info-article" title="">{$read}</span>
    {$view}
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

<?php \lbmzorx\components\widget\JsBlock::begin()?>
<script>
    var ajax_link;
    $('.message-type-read').click(function () {
        var id=$(this).attr('data-id');
        if(ajax_link){
            ajax_link.abort();
        }
        ajax_link=$.ajax({
            'url':'<?=\yii\helpers\Url::to(['message-status'])?>',
            'type':'post',
            'data':{
                id:id,
                '<?=\yii::$app->request->csrfParam?>':'<?=\yii::$app->request->csrfToken?>'
            },
            dataType:'json',
            success:function (res) {

            },
            error:function (res) {

            }
        });
    });
</script>
<?php \lbmzorx\components\widget\JsBlock::end()?>
