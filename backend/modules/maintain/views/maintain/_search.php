<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use lbmzorx\components\behavior\StatusCode;
use common\models\adminsearch\Maintain as SearchModel;
/* @var $this yii\web\View */
/* @var $model common\models\adminsearch\Maintain */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(<<<STYLE
.search-box .form-group{margin-bottom: 5px;line-height:0.2}
STYLE
        );
?>

<div class="maintain-search search-box">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'options_type',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('options_type'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-options_type'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$options_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'show_type',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('show_type'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-show_type'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'name',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('name'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-name'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'value',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('value'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-value'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'sign',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('sign'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-sign'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'url',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('url'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-url'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'info',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('info'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-info'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'sort',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('sort'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-sort'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'add_time',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('add_time'),
            'isTime'=>true,
            'timeType'=>'datetime',
            'dateConfig'=>[
                'range'=>'~',
            ],
            'isTips'=>true,
            'tipsType'=>'layer',
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-add_time'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'edit_time',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('edit_time'),
            'isTime'=>true,
            'timeType'=>'datetime',
            'dateConfig'=>[
                'range'=>'~',
            ],
            'isTips'=>true,
            'tipsType'=>'layer',
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-edit_time'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'status',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('status'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-status'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
