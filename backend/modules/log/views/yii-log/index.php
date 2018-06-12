<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\adminsearch\YiiLog;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\adminsearch\YiiLog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yii Logs');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="yii-log-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <p>
        <?=Html::button(Yii::t('app','Unfolding Search Condition').'  '.Html::tag('i','',['class'=>'fa fa-chevron-down']),['class'=>'btn btn-success ','id'=>'search-button'])?>
        <?php
        $this->registerJs(<<<str
var show=false;
$('#search-button').click(function(){
    if(show==true){
        $('#search-button').find('i').addClass('fa-chevron-down');
        $('#search-button').find('i').removeClass('fa-chevron-up');
        show=false;
    }else{
        $('#search-button').find('i').removeClass('fa-chevron-down');
        $('#search-button').find('i').addClass('fa-chevron-up');
        show=true;
    }
    $('#search-panel').toggle('fast');
});
str
);
        ?>
    </p>
    <div class="panel panel-success" id="search-panel" style="display: none">
        <div class="panel-body">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <p>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= Html::button('<i class="fa fa-trash-o"></i> '. Yii::t('app', 'Delete All'),
            ['class' => 'btn btn-success','id'=>'truncate-all']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' =>[
            'class'=>\lbmzorx\components\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','First'),
            'nextPageLabel'=>Yii::t('app','Next'),
            'prevPageLabel'=>Yii::t('app','Prev'),
            'lastPageLabel'=>Yii::t('app','Last'),
            'jButtonLabel' =>Yii::t('app','Jump'),
            'sButtonLabel' =>Yii::t('app','PageSize'),
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'level',
               'filter'=>StatusCode::tranStatusCode(YiiLog::$level_code,'app'),
               'value'=> function ($model) {
                   return Html::tag('label',$model->getStatusCode('level','level_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->level,
                           'class'=>'btn btn-xs btn-'.$model->getStatusCss('level','level_css',$model->level)
                       ]);
               },
               'format'=>'raw',
            ],
            'category',
            'log_time:datetime',
            'prefix:ntext',
//            'message:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}  {delete}',

            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php \lbmzorx\components\widget\JsBlock::begin()?>
<script type="text/javascript">
    $('#truncate-all').click(function () {
        layer.confirm('<?=\yii::t('app','Do you want to Delete all yii logs?')?>'
            ,function () {
                $.ajax({
                    url:'<?=\yii\helpers\Url::to(['truncate'])?>',
                    type:'post',
                    success:function(res){
                        if(res.status){
                            layer.msg(res.msg,{time:1000},function(){
                                $.pjax.reload('#w<?=GridView::$counter-1?>');
                            });
                        }else{
                            layer.alert(res.msg);
                        }
                    },
                    error:function () {
                        layer.alert('<?=\yii::t('app','Request Error !')?>');
                    },
                    dataType:'json'
                });
            }
        );
    });
</script>
<?php \lbmzorx\components\widget\JsBlock::end()?>
