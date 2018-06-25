<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model \yii\db\ActiveRecord */

\lbmzorx\components\assets\LayuiAsset::register($this);

$this->title = Html::encode( $model->title);
$this->params['breadcrumbs'][] = $this->title;

$edit='';
if(\yii::$app->user->id==$model->user_id) {
    $edit=Html::tag('div',
        Html::tag('div',
            Html::a(Html::tag('i','',['class'=>'fa fa-pencil']).'  '.\yii::t('app','Update'),
                ['update','id'=>$model->id],['class'=>'btn btn-info btn-all']),
            ['class'=>'panel-body']
        ),
    ['class'=>'panel panel-default']
    );
}
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <div class="page-header">
                <h1>
                  <?=Html::encode($model->title)?> <small></small>
                </h1>
            </div>
            <div class="info-action">
                <div class="action">
                    <span class="info-article" title=""><a href="<?=\yii\helpers\Url::to(['user/index','id'=>$model->user_id])?>" rel="author"><?=$model->user['username']?></a></span>
                    <span class="info-article" title=""><i class="fa fa-calendar"></i> <?=date("Y-m-d",$model->add_time)?></span>

                    <span class="info-article" title="<?=$model->getAttributeLabel('view')?>"><i class="fa fa-eye"></i> <?=$model->view?></span>
                    <span class="info-article" title="<?=$model->getAttributeLabel('thumbup')?>"><a href="javascript:void(0)" id="thumbup-article" data-id="<?=$model->id?>"><i class="fa fa-thumbs<?=$model->ifThumbup?'':'-o'?>-up"></i> <span id="thumbup-text"><?=$model->thumbup?></span></a></span>
                    <span class="info-article" title="<?=$model->getAttributeLabel('collection')?>"><a href="javascript:void(0)" id="collection-article" data-id="<?=$model->id?>"><i class="fa fa-folder<?=$model->ifCollection?'':'-o'?>"></i> <span id="collection-text"><?=$model->collection?></span></a></span>
                    <span class="info-article" title="<?=$model->getAttributeLabel('commit')?>"><i class="fa fa-commenting " data-id="<?=$model->id?>"></i> <?=$model->commit?></span>
                </div>
                <div class="action">
                    <span class="label label-info"><?=Html::encode($model->tag) ?></span>
                </div>
            </div>
            <?=\lbmzorx\components\widget\EditorMdView::widget([
                'model' => $model->articleContent,
                'attribute'=>'content'
            ])?>
            <?=\frontend\widget\ArticleCommitWidget::widget([
                'article_id'=>$model->id,
                'commitCount'=>$model->commit,
                'options'=>[
                    'class'=>'panel panel-commit',
                    'id'=>'article-box'
                ],
            ])?>
            <?=$this->render('/widget/_xinlang-share')?>
            <?=$this->render('/widget/_commitForm',['model'=>$commitForm,'article_id'=>$model->id])?>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 " id="side-box">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a class="btn btn-success btn-all" href="<?=\yii\helpers\Url::to(['article/create'])?>"><i class="fa fa-plus"></i>&nbsp; <?=\yii::t('app','Create New Article')?></a>
                </div>
            </div>
            <?=$edit?>
            <?=\frontend\widget\UserCardWidget::widget([
                    'userId'=>$model->user_id,
                    'options'=>[
                        'class'=>'panel panel-default',
                        'id'=>'user-info-box'
                    ],
            ])?>
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
<script type="text/javascript">
    var layer;
    layui.use('layer',function () {
        layer=layui.layer;
    });
    $("#thumbup-article").click(function () {
        var id=$(this).attr('data-id');
        $.ajax({
            url:'<?=\yii\helpers\Url::to(['article/thumbup'])?>',
            type:'post',
            data:{
                article_id:id,
                '<?=\yii::$app->request->csrfParam?>':'<?=\yii::$app->request->csrfToken?>'
            },
            dataType:'json',
            success:function (res) {
                layer.msg(res.msg);
                if(res.status){
                    $('#thumbup-text').text(res.thumbup);
                    var domi=$('#thumbup-article').find('i');
                    if(res.action==1){
                        domi.removeClass('fa-thumbs-o-up');
                        domi.addClass('fa-thumbs-up');
                    }else{
                        domi.removeClass('fa-thumbs-up');
                        domi.addClass('fa-thumbs-o-up');
                    }
                }
            },
            error:function (res) {
                if(res.status==403){
                    layer.alert('<?=\yii::t('app','Please Login!')?>',function () {
                        location.href='<?=\yii\helpers\Url::to(['/site/login'])?>';
                    });
                }else{
                    layer.alert('<?=\yii::t('app','Collection Failed!')?>');
                }
            }
        });
    });
    $("#collection-article").click(function () {
        var id=$(this).attr('data-id');
        $.ajax({
            url:'<?=\yii\helpers\Url::to(['article/collection'])?>',
            type:'post',
            data:{
                article_id:id,
                '<?=\yii::$app->request->csrfParam?>':'<?=\yii::$app->request->csrfToken?>'
            },
            dataType:'json',
            success:function (res) {
                layer.msg(res.msg);
                if(res.status){
                    $('#collection-text').text(res.collection);
                    var domi=$('#collection-article').find('i');
                    if(res.action==1){
                        domi.removeClass('fa-folder-o');
                        domi.addClass('fa-folder');
                    }else{
                        domi.removeClass('fa-folder');
                        domi.addClass('fa-folder-o');
                    }
                }
            },
            error:function (res) {
                if(res.status==403){
                    layer.alert('<?=\yii::t('app','Please Login!')?>',function () {
                        location.href='<?=\yii\helpers\Url::to(['/site/login'])?>';
                    });
                }else{
                    layer.alert('<?=\yii::t('app','Collection Failed!')?>');
                }
            }
        });
    });
</script>
<?php \lbmzorx\components\widget\JsBlock::end()?>
