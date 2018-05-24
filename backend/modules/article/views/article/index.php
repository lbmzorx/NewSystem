<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\startsearch\Article;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\startsearch\Article */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="article-index">
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
    'modelname' => Yii::t('app', 'Articles'),
]), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Remain'),'attribute'=>'remain','btnIcon'=>'remain','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Auth'),'attribute'=>'auth','btnIcon'=>'auth','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Level'),'attribute'=>'level','btnIcon'=>'level','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Publish'),'attribute'=>'publish','btnIcon'=>'publish','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Page Type'),'attribute'=>'page_type','btnIcon'=>'page_type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Headline'),'attribute'=>'flag_headline','btnIcon'=>'flag_headline','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Recommend'),'attribute'=>'flag_recommend','btnIcon'=>'flag_recommend','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Slide Show'),'attribute'=>'flag_slide_show','btnIcon'=>'flag_slide_show','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Special Recommend'),'attribute'=>'flag_special_recommend','btnIcon'=>'flag_special_recommend','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Roll'),'attribute'=>'flag_roll','btnIcon'=>'flag_roll','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Bold'),'attribute'=>'flag_bold','btnIcon'=>'flag_bold','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Flag Picture'),'attribute'=>'flag_picture','btnIcon'=>'flag_picture','griViewKey'=>GridView::$counter]) ?>
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
            'title',
//            'article_content_id',
            'user_id',
            'article_cate_id',
            [
            	'attribute'=>'sort',
            	'class'=>'lbmzorx\components\grid\SortColumn',
            ],            //'title',
            //'author',
            //'cover',
            //'abstract',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'remain',
               'filter'=>StatusCode::tranStatusCode(Article::$remain_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('remain','remain_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->remain,
                           'class'=>'remain-change btn btn-xs btn-'.$model->getStatusCss('remain','remain_css',$model->remain)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'auth',
               'filter'=>StatusCode::tranStatusCode(Article::$auth_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('auth','auth_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->auth,
                           'class'=>'auth-change btn btn-xs btn-'.$model->getStatusCss('auth','auth_css',$model->auth)
                       ]);
               },
               'format'=>'raw',
            ],
            //'tag',
            //'commit',
            //'view',
            //'collection',
            //'thumbup',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'level',
               'filter'=>StatusCode::tranStatusCode(Article::$level_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('level','level_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->level,
                           'class'=>'level-change btn btn-xs btn-'.$model->getStatusCss('level','level_css',$model->level)
                       ]);
               },
               'format'=>'raw',
            ],
            //'score',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'publish',
               'filter'=>StatusCode::tranStatusCode(Article::$publish_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('publish','publish_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->publish,
                           'class'=>'publish-change btn btn-xs btn-'.$model->getStatusCss('publish','publish_css',$model->publish)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>StatusCode::tranStatusCode(Article::$status_code,'app'),
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
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'page_type',
               'filter'=>StatusCode::tranStatusCode(Article::$page_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('page_type','page_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->page_type,
                           'class'=>'page_type-change btn btn-xs btn-'.$model->getStatusCss('page_type','page_type_css',$model->page_type)
                       ]);
               },
               'format'=>'raw',
            ],
            //'add_time:datetime',
            //'edit_time:datetime',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'flag_headline',
               'filter'=>StatusCode::tranStatusCode(Article::$flag_headline_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('flag_headline','flag_headline_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->flag_headline,
                           'class'=>'flag_headline-change btn btn-xs btn-'.$model->getStatusCss('flag_headline','flag_headline_css',$model->flag_headline)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'flag_recommend',
               'filter'=>StatusCode::tranStatusCode(Article::$flag_recommend_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('flag_recommend','flag_recommend_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->flag_recommend,
                           'class'=>'flag_recommend-change btn btn-xs btn-'.$model->getStatusCss('flag_recommend','flag_recommend_css',$model->flag_recommend)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'flag_slide_show',
               'filter'=>StatusCode::tranStatusCode(Article::$flag_slide_show_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('flag_slide_show','flag_slide_show_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->flag_slide_show,
                           'class'=>'flag_slide_show-change btn btn-xs btn-'.$model->getStatusCss('flag_slide_show','flag_slide_show_css',$model->flag_slide_show)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'flag_special_recommend',
               'filter'=>StatusCode::tranStatusCode(Article::$flag_special_recommend_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('flag_special_recommend','flag_special_recommend_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->flag_special_recommend,
                           'class'=>'flag_special_recommend-change btn btn-xs btn-'.$model->getStatusCss('flag_special_recommend','flag_special_recommend_css',$model->flag_special_recommend)
                       ]);
               },
               'format'=>'raw',
            ],
//            [
//               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
//               'attribute'=>'flag_roll',
//               'filter'=>StatusCode::tranStatusCode(Article::$flag_roll_code,'app'),
//               'value'=> function ($model) {
//                   return Html::button($model->getStatusCode('flag_roll','flag_roll_code'),
//                       [
//                           'data-id'=>$model->id,
//                           'data-value'=>$model->flag_roll,
//                           'class'=>'flag_roll-change btn btn-xs btn-'.$model->getStatusCss('flag_roll','flag_roll_css',$model->flag_roll)
//                       ]);
//               },
//               'format'=>'raw',
//            ],
//            [
//               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
//               'attribute'=>'flag_bold',
//               'filter'=>StatusCode::tranStatusCode(Article::$flag_bold_code,'app'),
//               'value'=> function ($model) {
//                   return Html::button($model->getStatusCode('flag_bold','flag_bold_code'),
//                       [
//                           'data-id'=>$model->id,
//                           'data-value'=>$model->flag_bold,
//                           'class'=>'flag_bold-change btn btn-xs btn-'.$model->getStatusCss('flag_bold','flag_bold_css',$model->flag_bold)
//                       ]);
//               },
//               'format'=>'raw',
//            ],
//            [
//               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
//               'attribute'=>'flag_picture',
//               'filter'=>StatusCode::tranStatusCode(Article::$flag_picture_code,'app'),
//               'value'=> function ($model) {
//                   return Html::button($model->getStatusCode('flag_picture','flag_picture_code'),
//                       [
//                           'data-id'=>$model->id,
//                           'data-value'=>$model->flag_picture,
//                           'class'=>'flag_picture-change btn btn-xs btn-'.$model->getStatusCss('flag_picture','flag_picture_css',$model->flag_picture)
//                       ]);
//               },
//               'format'=>'raw',
//            ],
//            [
//               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
//               'attribute'=>'recycle',
//               'filter'=>StatusCode::tranStatusCode(Article::$recycle_code,'app'),
//               'value'=> function ($model) {
//                   return Html::button($model->getStatusCode('recycle','recycle_code'),
//                       [
//                           'data-id'=>$model->id,
//                           'data-value'=>$model->recycle,
//                           'class'=>'recycle-change btn btn-xs btn-'.$model->getStatusCss('recycle','recycle_css',$model->recycle)
//                       ]);
//               },
//               'format'=>'raw',
//            ],
            //'admin_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="remain-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="remain">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$remain_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$remain_css) && isset(Article::$remain_css[$k])){
                        $css = Article::$remain_css [$k];
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
<div id="auth-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="auth">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$auth_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$auth_css) && isset(Article::$auth_css[$k])){
                        $css = Article::$auth_css [$k];
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
<div id="level-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="level">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$level_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$level_css) && isset(Article::$level_css[$k])){
                        $css = Article::$level_css [$k];
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
<div id="publish-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="publish">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$publish_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$publish_css) && isset(Article::$publish_css[$k])){
                        $css = Article::$publish_css [$k];
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
<div id="status-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$status_css) && isset(Article::$status_css[$k])){
                        $css = Article::$status_css [$k];
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
<div id="page_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="page_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$page_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$page_type_css) && isset(Article::$page_type_css[$k])){
                        $css = Article::$page_type_css [$k];
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
<div id="flag_headline-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_headline">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_headline_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_headline_css) && isset(Article::$flag_headline_css[$k])){
                        $css = Article::$flag_headline_css [$k];
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
<div id="flag_recommend-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_recommend">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_recommend_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_recommend_css) && isset(Article::$flag_recommend_css[$k])){
                        $css = Article::$flag_recommend_css [$k];
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
<div id="flag_slide_show-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_slide_show">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_slide_show_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_slide_show_css) && isset(Article::$flag_slide_show_css[$k])){
                        $css = Article::$flag_slide_show_css [$k];
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
<div id="flag_special_recommend-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_special_recommend">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_special_recommend_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_special_recommend_css) && isset(Article::$flag_special_recommend_css[$k])){
                        $css = Article::$flag_special_recommend_css [$k];
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
<div id="flag_roll-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_roll">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_roll_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_roll_css) && isset(Article::$flag_roll_css[$k])){
                        $css = Article::$flag_roll_css [$k];
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
<div id="flag_bold-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_bold">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_bold_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_bold_css) && isset(Article::$flag_bold_css[$k])){
                        $css = Article::$flag_bold_css [$k];
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
<div id="flag_picture-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="flag_picture">
        <input type="hidden" name="id" value="">
        <?php foreach ( Article::$flag_picture_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$flag_picture_css) && isset(Article::$flag_picture_css[$k])){
                        $css = Article::$flag_picture_css [$k];
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
        <?php foreach ( Article::$recycle_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Article::$recycle_css) && isset(Article::$recycle_css[$k])){
                        $css = Article::$recycle_css [$k];
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
