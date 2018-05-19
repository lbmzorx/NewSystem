<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\adminsearch\AdminMessage;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\adminsearch\AdminMessage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admin Messages');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="admin-message-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <p>
        <?=Html::button(Yii::t('app','Search button').'  '.Html::tag('i','',['class'=>'fa fa-chevron-down']),['class'=>'btn btn-success ','id'=>'search-button'])?>
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
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Admin Message'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Spread Type'),'attribute'=>'spread_type','btnIcon'=>'spread_type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Level'),'attribute'=>'level','btnIcon'=>'level','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Read'),'attribute'=>'read','btnIcon'=>'read','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','From Type'),'attribute'=>'from_type','btnIcon'=>'from_type','griViewKey'=>GridView::$counter]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' =>[
            'class'=>\lbmzorx\components\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','first'),
            'nextPageLabel'=>Yii::t('app','next'),
            'prevPageLabel'=>Yii::t('app','prev'),
            'lastPageLabel'=>Yii::t('app','last'),
            'jButtonLabel' =>Yii::t('app','Jump'),
            'sButtonLabel' =>Yii::t('app','PageSize'),
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'to_admin_id',
            'from_admin_id',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'spread_type',
               'filter'=>StatusCode::tranStatusCode(AdminMessage::$spread_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('spread_type','spread_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->spread_type,
                           'class'=>'spread_type-change btn btn-xs btn-'.$model->getStatusCss('spread_type','spread_type_css',$model->spread_type)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'level',
               'filter'=>StatusCode::tranStatusCode(AdminMessage::$level_code,'app'),
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
            'name',
            'content',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'read',
               'filter'=>StatusCode::tranStatusCode(AdminMessage::$read_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('read','read_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->read,
                           'class'=>'read-change btn btn-xs btn-'.$model->getStatusCss('read','read_css',$model->read)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'from_type',
               'filter'=>StatusCode::tranStatusCode(AdminMessage::$from_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('from_type','from_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->from_type,
                           'class'=>'from_type-change btn btn-xs btn-'.$model->getStatusCss('from_type','from_type_css',$model->from_type)
                       ]);
               },
               'format'=>'raw',
            ],
            //'add_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="spread_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="spread_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( AdminMessage::$spread_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(AdminMessage::$spread_type_css) && isset(AdminMessage::$spread_type_css[$k])){
                        $css = AdminMessage::$spread_type_css [$k];
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
        <?php foreach ( AdminMessage::$level_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(AdminMessage::$level_css) && isset(AdminMessage::$level_css[$k])){
                        $css = AdminMessage::$level_css [$k];
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
<div id="read-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="read">
        <input type="hidden" name="id" value="">
        <?php foreach ( AdminMessage::$read_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(AdminMessage::$read_css) && isset(AdminMessage::$read_css[$k])){
                        $css = AdminMessage::$read_css [$k];
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
<div id="from_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="from_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( AdminMessage::$from_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(AdminMessage::$from_type_css) && isset(AdminMessage::$from_type_css[$k])){
                        $css = AdminMessage::$from_type_css [$k];
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
