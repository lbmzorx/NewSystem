<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\admindata\Menu;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\admindata\Menu */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'position')->dropDownList(StatusCode::tranStatusCode(Menu::$position_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'parent_id')->dropDownList(Menu::getMenusName([]),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'icon',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>Html::tag('i','',['class'=>$model->icon,]),
            'firstOption'=>['id'=>'icon-show'],
            'endContent'=>'<button class="btn btn-success" id="icon-change" type="button"><i class="fa fa-search"></i></button>',
        ])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sort')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'target')->dropDownList(StatusCode::tranStatusCode(Menu::$target_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'is_absolute_url')->dropDownList(StatusCode::tranStatusCode(Menu::$is_absolute_url_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'is_display')->dropDownList(StatusCode::tranStatusCode(Menu::$is_display_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'recycle')->dropDownList(StatusCode::tranStatusCode(Menu::$recycle_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'top_id')->dropDownList(Menu::getMenusName([
                'position'=>Menu::POSITION_TOP,
        ]),
            ['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'module')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>
	</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
    </div>
</div>


<div class="panel" id="icon-list" style="display: none;">
    <div class="panel-body">
        <?=$this->render('//widgets/_icon')?>
    </div>
</div>
<?php \lbmzorx\components\widget\JsBlock::begin()?>
    <script>
        var layer;
        layui.use(['layer'],function () {
            layer=layui.layer;
        });
        $("#icon-change").on('click',function(){
            var iconlayer=layer.open({
                type:1,
                area:['800px','900px'],
                content:$('#icon-list')
            });

            $('#icon-list').on('click','a',function(){
                layer.close(iconlayer);
                var iclass=$(this).html();
                $('#icon-show').html(iclass);
                $('#<?=Html::getInputId($model,'icon')?>').val($(iclass).attr('class'));
            });
        });

    </script>
<?php \lbmzorx\components\widget\JsBlock::end()?>