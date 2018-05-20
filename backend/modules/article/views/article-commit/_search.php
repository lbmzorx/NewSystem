<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use lbmzorx\components\behavior\StatusCode;
use common\models\startsearch\ArticleCommit as SearchModel;
/* @var $this yii\web\View */
/* @var $model common\models\startsearch\ArticleCommit */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(<<<STYLE
.search-box .form-group{margin-bottom: 5px;line-height:0.2}
STYLE
        );
?>

<div class="article-commit-search search-box">

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
		<?=$form->field($model, 'article_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('article_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-article_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'user_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('user_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-user_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'parent_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('parent_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-parent_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'content',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('content'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-content'],
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
<div class="row">
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
		<?=$form->field($model, 'recycle',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('recycle'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-recycle'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$recycle_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'level',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('level'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-level'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'path',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('path'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-path'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
