<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\startsearch\UserMessage;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\startsearch\UserMessage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Messages');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="user-message-index">
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
    'modelname' => Yii::t('app', 'User Messages'),
]), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Read'),'attribute'=>'read','btnIcon'=>'read','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Priority'),'attribute'=>'priority','btnIcon'=>'priority','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Send Type'),'attribute'=>'send_type','btnIcon'=>'send_type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Is Link'),'attribute'=>'is_link','btnIcon'=>'is_link','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Group Type'),'attribute'=>'group_type','btnIcon'=>'group_type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Message Type'),'attribute'=>'message_type','btnIcon'=>'message_type','griViewKey'=>GridView::$counter]) ?>
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
            'send_id',
            'to_id',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'read',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$read_code,'app'),
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
               'attribute'=>'status',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$status_code,'app'),
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
               'attribute'=>'priority',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$priority_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('priority','priority_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->priority,
                           'class'=>'priority-change btn btn-xs btn-'.$model->getStatusCss('priority','priority_css',$model->priority)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'send_type',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$send_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('send_type','send_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->send_type,
                           'class'=>'send_type-change btn btn-xs btn-'.$model->getStatusCss('send_type','send_type_css',$model->send_type)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_link',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$is_link_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_link','is_link_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->is_link,
                           'class'=>'is_link-change btn btn-xs btn-'.$model->getStatusCss('is_link','is_link_css',$model->is_link)
                       ]);
               },
               'format'=>'raw',
            ],
            'content',
            'link',
            //'add_time',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'group_type',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$group_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('group_type','group_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->group_type,
                           'class'=>'group_type-change btn btn-xs btn-'.$model->getStatusCss('group_type','group_type_css',$model->group_type)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'message_type',
               'filter'=>StatusCode::tranStatusCode(UserMessage::$message_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('message_type','message_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->message_type,
                           'class'=>'message_type-change btn btn-xs btn-'.$model->getStatusCss('message_type','message_type_css',$model->message_type)
                       ]);
               },
               'format'=>'raw',
            ],
            //'user_message_group_content_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="read-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="read">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$read_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$read_css) && isset(UserMessage::$read_css[$k])){
                        $css = UserMessage::$read_css [$k];
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
        <?php foreach ( UserMessage::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$status_css) && isset(UserMessage::$status_css[$k])){
                        $css = UserMessage::$status_css [$k];
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
<div id="priority-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="priority">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$priority_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$priority_css) && isset(UserMessage::$priority_css[$k])){
                        $css = UserMessage::$priority_css [$k];
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
<div id="send_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="send_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$send_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$send_type_css) && isset(UserMessage::$send_type_css[$k])){
                        $css = UserMessage::$send_type_css [$k];
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
<div id="is_link-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="is_link">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$is_link_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$is_link_css) && isset(UserMessage::$is_link_css[$k])){
                        $css = UserMessage::$is_link_css [$k];
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
<div id="group_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="group_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$group_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$group_type_css) && isset(UserMessage::$group_type_css[$k])){
                        $css = UserMessage::$group_type_css [$k];
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
<div id="message_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="message_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( UserMessage::$message_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(UserMessage::$message_type_css) && isset(UserMessage::$message_type_css[$k])){
                        $css = UserMessage::$message_type_css [$k];
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
