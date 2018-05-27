<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model \yii\db\ActiveRecord */

\lbmzorx\components\assets\LayuiAsset::register($this);

$this->title = Html::encode( $model->title);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <div class="page-header">
                <h1>
                  <?=Html::encode($model->title)?> <small></small>
                </h1>
            </div>
            <div class="action">
                <span class="info-article" title=""><a href="<?=\yii\helpers\Url::to(['user/index','id'=>$model->user_id])?>" rel="author"><?=$model->user['username']?></a></span>
                <span class="info-article" title=""><i class="fa fa-calendar"></i> <?=date("Y-m-d",$model->add_time)?></span>

                <span class="info-article" title="<?=$model->getAttributeLabel('view')?>"><i class="fa fa-eye"></i> <?=$model->view?></span>
                <span class="info-article" title="<?=$model->getAttributeLabel('thumbup')?>"><a href="javascript:void(0)" id="thumbup-article" data-id="<?=$model->id?>"><i class="fa fa-thumbs<?=$model->ifThumbup?'':'-o'?>-up"></i> <?=$model->thumbup?></a></span>
                <span class="info-article" title="<?=$model->getAttributeLabel('collection')?>"><a href="javascript:void(0)" id="collection-article" data-id="<?=$model->id?>"><i class="fa fa-folder<?=$model->ifThumbup?'':'-o'?>"></i> <?=$model->collection?></a></span>
                <span class="info-article" title="<?=$model->getAttributeLabel('commit')?>"><i class="fa fa-commenting " data-id="<?=$model->id?>"></i> <?=$model->commit?></span>
            </div>
            <div class="action">
                <span class="label label-info"><?=Html::encode($model->tag) ?></span>
            </div>
            <?=\lbmzorx\components\widget\EditorMdView::widget([
                'model' => $model->articleContent,
                'attribute'=>'content'
            ])?>

            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
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
                    if(res.action==1){
                        $('#thumbup-article').find('i').removeClass('fa-thumbs-o');
                        $('#thumbup-article').find('i').addClass('fa-thumbs');
                    }else{
                        $('#thumbup-article').find('i').removeClass('fa-thumbs');
                        $('#thumbup-article').find('i').addClass('fa-thumbs-o');
                    }
                }
            },
            error:function (res) {
                layer.alert('<?=\yii::t('app','Thumbup Failed!')?>');
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
                    if(res.action==1){
                        $('#collection-article').find('i').removeClass('fa-thumbs-o');
                        $('#collection-article').find('i').addClass('fa-thumbs');
                    }else{
                        $('#collection-article').find('i').removeClass('fa-thumbs');
                        $('#collection-article').find('i').addClass('fa-thumbs-o');
                    }
                }
            },
            error:function (res) {
                layer.alert('<?=\yii::t('app','Collection Failed!')?>');
            }
        });
    });
</script>
<?php \lbmzorx\components\widget\JsBlock::end()?>
