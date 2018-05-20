<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\adminsearch\Menu;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\adminsearch\Menu */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="menu-index">
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
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Position'),'attribute'=>'position','btnIcon'=>'position','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Target'),'attribute'=>'target','btnIcon'=>'target','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Is Absolute Url'),'attribute'=>'is_absolute_url','btnIcon'=>'is_absolute_url','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Is Display'),'attribute'=>'is_display','btnIcon'=>'is_display','griViewKey'=>GridView::$counter]) ?>
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
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'position',
               'filter'=>StatusCode::tranStatusCode(Menu::$position_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('position','position_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->position,
                           'class'=>'position-change btn btn-xs btn-'.$model->getStatusCss('position','position_css',$model->position)
                       ]);
               },
               'format'=>'raw',
            ],
            'parent_id',
            'name',
            'url:url',
            [
                'attribute'=>'icon',
                'format'=>'raw',
                'value'=>function($model){
                    return Html::tag('i','',['class'=>$model->icon]);
                }
            ],

            [
            	'attribute'=>'sort',
            	'class'=>'lbmzorx\components\grid\SortColumn',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'target',
               'filter'=>StatusCode::tranStatusCode(Menu::$target_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('target','target_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->target,
                           'class'=>'target-change btn btn-xs btn-'.$model->getStatusCss('target','target_css',$model->target)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_absolute_url',
               'filter'=>StatusCode::tranStatusCode(Menu::$is_absolute_url_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_absolute_url','is_absolute_url_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->is_absolute_url,
                           'class'=>'is_absolute_url-change btn btn-xs btn-'.$model->getStatusCss('is_absolute_url','is_absolute_url_css',$model->is_absolute_url)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_display',
               'filter'=>StatusCode::tranStatusCode(Menu::$is_display_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_display','is_display_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->is_display,
                           'class'=>'is_display-change btn btn-xs btn-'.$model->getStatusCss('is_display','is_display_css',$model->is_display)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'recycle',
               'filter'=>StatusCode::tranStatusCode(Menu::$recycle_code,'app'),
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
            //'add_time',
            //'edit_time',
            'top_id',
            'module',
            'controller',
            'action',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="position-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="position">
        <input type="hidden" name="id" value="">
        <?php foreach ( Menu::$position_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Menu::$position_css) && isset(Menu::$position_css[$k])){
                        $css = Menu::$position_css [$k];
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
<div id="target-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="target">
        <input type="hidden" name="id" value="">
        <?php foreach ( Menu::$target_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Menu::$target_css) && isset(Menu::$target_css[$k])){
                        $css = Menu::$target_css [$k];
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
<div id="is_absolute_url-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="is_absolute_url">
        <input type="hidden" name="id" value="">
        <?php foreach ( Menu::$is_absolute_url_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Menu::$is_absolute_url_css) && isset(Menu::$is_absolute_url_css[$k])){
                        $css = Menu::$is_absolute_url_css [$k];
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
<div id="is_display-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="is_display">
        <input type="hidden" name="id" value="">
        <?php foreach ( Menu::$is_display_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Menu::$is_display_css) && isset(Menu::$is_display_css[$k])){
                        $css = Menu::$is_display_css [$k];
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
        <?php foreach ( Menu::$recycle_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Menu::$recycle_css) && isset(Menu::$recycle_css[$k])){
                        $css = Menu::$recycle_css [$k];
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
