<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use lbmzorx\components\widget\BatchUpdate;
use common\models\startsearch\Options;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\widget\BatchDelete;

/* @var $this yii\web\View */
/* @var $searchModel common\models\startsearch\Options */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Options');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
        p .btn{margin-top:5px;}
STYLE
);
?>
<div class="options-index">
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
    'modelname' => Yii::t('app', 'Options'),
]), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>Yii::t('app', 'Batch Deletes'),'griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Type'),'attribute'=>'type','btnIcon'=>'type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Input Type'),'attribute'=>'input_type','btnIcon'=>'input_type','griViewKey'=>GridView::$counter]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Autoload'),'attribute'=>'autoload','btnIcon'=>'autoload','griViewKey'=>GridView::$counter]) ?>
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
               'attribute'=>'type',
               'filter'=>StatusCode::tranStatusCode(Options::$type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('type','type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->type,
                           'class'=>'type-change btn btn-xs btn-'.$model->getStatusCss('type','type_css',$model->type)
                       ]);
               },
               'format'=>'raw',
            ],
            'tips',
            'name',
            'value:ntext',
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'input_type',
               'filter'=>StatusCode::tranStatusCode(Options::$input_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('input_type','input_type_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->input_type,
                           'class'=>'input_type-change btn btn-xs btn-'.$model->getStatusCss('input_type','input_type_css',$model->input_type)
                       ]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\lbmzorx\components\grid\StatusCodeColumn::className(),
               'attribute'=>'autoload',
               'filter'=>StatusCode::tranStatusCode(Options::$autoload_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('autoload','autoload_code'),
                       [
                           'data-id'=>$model->id,
                           'data-value'=>$model->autoload,
                           'class'=>'autoload-change btn btn-xs btn-'.$model->getStatusCss('autoload','autoload_css',$model->autoload)
                       ]);
               },
               'format'=>'raw',
            ],
            [
            	'attribute'=>'sort',
            	'class'=>'lbmzorx\components\grid\SortColumn',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'delete' => function ($url, $model, $key) {
                        $title = Yii::t('yii', 'Delete');
                        $options = array_merge([
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                        ], [],[]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
                        return ($model->id > 20)?Html::a($icon, $url, $options) : '';
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="type">
        <input type="hidden" name="id" value="">
        <?php foreach ( Options::$type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Options::$type_css) && isset(Options::$type_css[$k])){
                        $css = Options::$type_css [$k];
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
<div id="input_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="input_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( Options::$input_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Options::$input_type_css) && isset(Options::$input_type_css[$k])){
                        $css = Options::$input_type_css [$k];
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
<div id="autoload-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="autoload">
        <input type="hidden" name="id" value="">
        <?php foreach ( Options::$autoload_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(Options::$autoload_css) && isset(Options::$autoload_css[$k])){
                        $css = Options::$autoload_css [$k];
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
