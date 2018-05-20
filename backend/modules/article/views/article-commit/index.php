<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\startsearch\ArticleCommit;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\startsearch\ArticleCommit */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Article Commits');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="article-commit-index">
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
        <?= Html::a('<i class="fa fa-plus-square"></i> '. Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Article Commits'),
]), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Recycle'),'attribute'=>'recycle','btnIcon'=>'recycle','griViewKey'=>GridView::$counter]) ?>
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
            'article_id',
            'user_id',
            'parent_id',
            'content',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>StatusCode::tranStatusCode(ArticleCommit::$status_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('status','status_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->status,
                           'class'=>'status-change btn btn-xs btn-'.$model->getStatusCss('status','status_css',$model->status)
                       ]);
               },
               'format'=>'raw',
            ],
            //'add_time',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'recycle',
               'filter'=>StatusCode::tranStatusCode(ArticleCommit::$recycle_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('recycle','recycle_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->recycle,
                           'class'=>'recycle-change btn btn-xs btn-'.$model->getStatusCss('recycle','recycle_css',$model->recycle)
                       ]);
               },
               'format'=>'raw',
            ],
            //'level',
            //'path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="status-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( ArticleCommit::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(ArticleCommit::$status_css) && isset(ArticleCommit::$status_css[$k])){
                        $css = ArticleCommit::$status_css [$k];
                    }else{
                        $css=isset(StatusCode::$cssCode[$k])?StatusCode::$cssCode[$k]:$css;
                    }
                ?>               
                <?=Html::input('radio','value',$k)?>
                <?=Html::tag('span',\Yii::t('app',$v),['class'=>'btn btn-'.$css])?>
            </label>          
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>
<div id="recycle-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="recycle">
        <input type="hidden" name="id" value="">
        <?php foreach ( ArticleCommit::$recycle_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(ArticleCommit::$recycle_css) && isset(ArticleCommit::$recycle_css[$k])){
                        $css = ArticleCommit::$recycle_css [$k];
                    }else{
                        $css=isset(StatusCode::$cssCode[$k])?StatusCode::$cssCode[$k]:$css;
                    }
                ?>               
                <?=Html::input('radio','value',$k)?>
                <?=Html::tag('span',\Yii::t('app',$v),['class'=>'btn btn-'.$css])?>
            </label>          
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>
