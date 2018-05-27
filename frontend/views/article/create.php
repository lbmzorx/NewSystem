<?php

/* @var $this yii\web\View */
/* @var $model \yii\base\Model */
use \lbmzorx\components\helper\TreeHelper;
use common\models\startdata\ArticleCate;

\lbmzorx\components\assets\LayuiAsset::register($this);
$this->title = \yii::t('app','Create Article');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <?php $form = \yii\widgets\ActiveForm::begin(); ?>
            <?= $form->field($model, 'publish')->hiddenInput([])->label(false); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <?= $form->field($model, 'article_cate_id')->dropDownList(
                        TreeHelper::treeArray(TreeHelper::array_cate_as_subarray(
                            ArticleCate::find()
                                ->select('id,name,parent_id')
                                ->asArray()
                                ->indexBy('id')->all(),0,'parent_id')
                        ),
                        ['format'=>'raw','prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'content',[
                        'class'=>\lbmzorx\components\widget\EditorMdField::className(),
                        'mdJsOptions'=>[
                            'placeholder'=>'请输入内容',
                        ],
                    ])->textarea();?>
                </div>
            </div>

            <div class="row" id="button-list-box">
                <div class="col-lg-3 col-sm-3">
                    <div class="form-group">
                        <button class="btn btn-success" id="articleForm-publish"><?=\yii::t('app','Publish')?></button>
                        <button class="btn btn-success" id="articleForm-unpublish"><?=\yii::t('app','Draft')?></button>
                    </div>
                </div>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 " id="side-box">
            <?=\frontend\widget\PulishAttensionWidget::widget([
                    'title'=>\yii::t('app','Attention'),
                    'options'=>[
                        'class'=>'panel panel-default',
                        'id'=>'article-attention-box'
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
<?php
$publishId=\yii\helpers\Html::getInputId($model,'publish');
$formId=$form->id;
$msg=\yii::t('app','Do you want to publish this article?');
$confirm='\''.\yii::t('app','Yes').'\',\''.\yii::t('app','No').'\'';
?>
<?php $this->registerJs(<<<SCRIPT
var layer;
layui.use('layer',function(){
    layer=layui.layer;
});
$('#articleForm-publish').click(function(){
    $('#{$publishId}').val(1);
});
$('#articleForm-unpublish').click(function(){
    $('#{$publishId}').val(0);
});
function fullscreenExitTriger(){
    $('#button-list-box').show();
}
function fullscreenOpenTriger(){
   $('#button-list-box').hide(); 
}
$('#button-list-box').click(function(event){ 
layer.confirm('$msg', {
  btn: [{$confirm}] //按钮
}, function(){
 $('#$formId').submit();
});
event.stopPropagation();
return false;
});
SCRIPT
)?>