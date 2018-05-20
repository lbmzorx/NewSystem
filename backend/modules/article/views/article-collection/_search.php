<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\startsearch\ArticleCollection */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(<<<STYLE
.search-box .form-group{margin-bottom: 5px;line-height:0.2}
STYLE
        );
?>

<div class="article-collection-search search-box">

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
</div>    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
