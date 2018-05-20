<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\adminsearch\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(<<<STYLE
.search-box .form-group{margin-bottom: 5px;line-height:0.2}
STYLE
        );
?>

<div class="auth-assignment-search search-box">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'item_name',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('item_name'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-item_name'],
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
		<?=$form->field($model, 'created_at',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('created_at'),
            'isTime'=>true,
            'timeType'=>'datetime',
            'dateConfig'=>[
                'range'=>'~',
            ],
            'isTips'=>true,
            'tipsType'=>'layer',
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-created_at'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
